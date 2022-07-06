import 'package:flutter/material.dart';
import 'package:infovillamobile/model/ApiResponse.dart';
import 'package:infovillamobile/services/review_services.dart';

import '../../global.dart';
import '../../model/reviewModel.dart';
import '../../services/user_services.dart';
import '../login.dart';

class ReviewAdmin extends StatefulWidget {
  ReviewAdmin({Key? key}) : super(key: key);

  @override
  State<ReviewAdmin> createState() => _ReviewAdminState();
}

class _ReviewAdminState extends State<ReviewAdmin> {
  List<dynamic> _reviewList = [];
  int userId = 0;
  bool _loading = true;

  // get all posts
  Future<void> retrieveReview() async {
    userId = await getUserId();
    ApiResponse response = await getReview();

    if (response.error == null) {
      setState(() {
        _reviewList = response.data as List<dynamic>;
        _loading = _loading ? !_loading : _loading;
      });
    } else if (response.error == unauthorized) {
      logout().then((value) => {
            Navigator.of(context).pushAndRemoveUntil(
                MaterialPageRoute(builder: (context) => Login()),
                (route) => false)
          });
    } else {
      ScaffoldMessenger.of(context).showSnackBar(SnackBar(
        content: Text('${response.error}'),
      ));
    }
  }

  void _handleDeleteReview(int reviewId) async {
    ApiResponse response = await deleteReview(reviewId);
    if (response.error == null) {
      retrieveReview();
    } else if (response.error == unauthorized) {
      logout().then((value) => {
            Navigator.of(context).pushAndRemoveUntil(
                MaterialPageRoute(builder: (context) => Login()),
                (route) => false)
          });
    } else {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('${response.error}')));
    }
  }

  @override
  void initState() {
    retrieveReview();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return _loading
        ? Center(child: CircularProgressIndicator())
        : RefreshIndicator(
            onRefresh: () {
              return retrieveReview();
            },
            child: ListView.builder(
                itemCount: _reviewList.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    title: Text(_reviewList[index]['user']['username']),
                    subtitle: Text(_reviewList[index]['review']),
                    trailing: GestureDetector(
                      child: Icon(Icons.delete),
                      onTap: () {
                        _handleDeleteReview(_reviewList[index]['id']);
                      },
                    ),
                  );
                }),
          );
  }
}
