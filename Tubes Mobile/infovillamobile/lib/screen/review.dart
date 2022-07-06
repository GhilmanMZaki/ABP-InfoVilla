import 'package:flutter/material.dart';
import 'package:smooth_star_rating/smooth_star_rating.dart';

import '../global.dart';
import '../model/ApiResponse.dart';
import '../services/review_services.dart';
import '../services/user_services.dart';
import 'login.dart';

class ReviewPost extends StatefulWidget {
  final int? villaId;
  ReviewPost({Key? key, this.villaId}) : super(key: key);

  @override
  State<ReviewPost> createState() => _ReviewPostState();
}

class _ReviewPostState extends State<ReviewPost> {
  TextEditingController reviewController = TextEditingController();
  final GlobalKey<FormState> _formkey = GlobalKey<FormState>();
  bool _loading = false;
  bool loading = false;
  double _rating = 0;

  // create comment
  void _createReview() async {
    ApiResponse response =
        await createReview(widget.villaId!, reviewController.text, _rating);
    if (response.error == null) {
      Navigator.of(context).pop();
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('Review Berhasil diupload')));
    } else if (response.error == unauthorized) {
      logout().then((value) => {
            Navigator.of(context).pushAndRemoveUntil(
                MaterialPageRoute(builder: (context) => Login()),
                (route) => false)
          });
    } else {
      setState(() {
        _loading = false;
      });
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('${response.error}')));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Add Review'),
        centerTitle: true,
      ),
      body: Padding(
          padding: EdgeInsets.all(10),
          child: Form(
              key: _formkey,
              child: ListView(
                children: <Widget>[
                  Container(
                    padding: EdgeInsets.all(10),
                    child: Text(
                      "Beri Bintang untuk Villa Pilihanmu",
                      style: TextStyle(fontSize: 25),
                    ),
                  ),
                  Container(
                    padding: EdgeInsets.all(10),
                    child: SmoothStarRating(
                      size: 40,
                      color: Colors.amber,
                      borderColor: Colors.amber,
                      spacing: 0,
                      allowHalfRating: false,
                      onRated: (rating) {
                        _rating = rating;
                      },
                    ),
                  ),
                  Container(
                    padding: const EdgeInsets.all(10),
                    child: TextFormField(
                        maxLines: null,
                        controller: reviewController,
                        decoration: const InputDecoration(
                          border: OutlineInputBorder(),
                          labelText: 'Review',
                        ),
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Review Tidak Boleh Kosong';
                          }
                          return null;
                        }),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Container(
                      height: 50,
                      padding: const EdgeInsets.fromLTRB(10, 0, 10, 0),
                      child: ElevatedButton(
                        child: const Text('Add Review'),
                        onPressed: () {
                          if (_formkey.currentState!.validate()) {
                            _createReview();
                            loading = true;
                          }
                          ;
                        },
                      ))
                ],
              ))),
    );
  }
}
