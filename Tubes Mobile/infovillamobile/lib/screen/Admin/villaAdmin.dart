import 'package:flutter/material.dart';
import 'package:infovillamobile/services/villa_services.dart';

import '../../global.dart';
import '../../model/ApiResponse.dart';
import '../../model/villaModel.dart';
import '../../services/user_services.dart';
import '../login.dart';

class VillaAdmin extends StatefulWidget {
  VillaAdmin({Key? key}) : super(key: key);

  @override
  State<VillaAdmin> createState() => _VillaAdminState();
}

class _VillaAdminState extends State<VillaAdmin> {
  List<dynamic> _villaList = [];
  int userId = 0;
  bool _loading = true;

  // get all posts
  Future<void> retrieveVilla() async {
    userId = await getUserId();
    ApiResponse response = await getVilla();

    if (response.error == null) {
      setState(() {
        _villaList = response.data as List<dynamic>;
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

  void _handleDeleteVilla(int villaId) async {
    ApiResponse response = await deletePost(villaId);
    if (response.error == null) {
      retrieveVilla();
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
    retrieveVilla();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return _loading
        ? Center(child: CircularProgressIndicator())
        : RefreshIndicator(
            onRefresh: () {
              return retrieveVilla();
            },
            child: ListView.builder(
                itemCount: _villaList.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    title: Text(_villaList[index]['namaVilla']),
                    subtitle: Text("Rating : ${_villaList[index]['rating']}"),
                    trailing: GestureDetector(
                      child: Icon(Icons.delete),
                      onTap: () {
                        _handleDeleteVilla(_villaList[index]['id']);
                      },
                    ),
                  );
                }),
          );
  }
}
