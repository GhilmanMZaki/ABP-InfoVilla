import 'package:flutter/material.dart';
import 'package:infovillamobile/model/villaModel.dart';
import 'package:infovillamobile/screen/search.dart';
import 'package:infovillamobile/screen/villa_card.dart';
import 'package:infovillamobile/screen/villa_detail.dart';
import 'package:infovillamobile/services/review_services.dart';

import '../global.dart';
import '../model/ApiResponse.dart';
import '../services/user_services.dart';
import '../services/villa_services.dart';
import 'login.dart';

class Villa_Screen extends StatefulWidget {
  Villa_Screen({Key? key}) : super(key: key);

  @override
  State<Villa_Screen> createState() => _Villa_ScreenState();
}

class _Villa_ScreenState extends State<Villa_Screen> {
  List<dynamic> _villaList = [];
  List<dynamic> _favoriteList = [];
  int userId = 0;
  bool _loading = true;

  // get all posts
  Future<void> retrieveVilla() async {
    userId = await getUserId();
    ApiResponse response = await getVilla();
    ApiResponse response2 = await getFavorite();

    if (response.error == null && response2.error == null) {
      setState(() {
        _villaList = response.data as List<dynamic>;
        _favoriteList = response2.data as List<dynamic>;
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

  void _handleVillaLikeDislike(int villaId) async {
    ApiResponse response = await likeUnlikeVilla(villaId);

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
            child: Padding(
              padding: EdgeInsets.symmetric(horizontal: 24.0, vertical: 12.0),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  //Let's create the welcoming Text
                  Text(
                    "Cari Villa Terbaikmu\ndengan mudah",
                    style: TextStyle(
                      fontSize: 28.0,
                      fontWeight: FontWeight.w700,
                    ),
                  ),
                  SizedBox(
                    height: 20.0,
                  ),
                  Container(
                    width: double.infinity,
                    height: 50.0,
                    decoration: BoxDecoration(
                      color: Color(0x55d2d2d2),
                      borderRadius: BorderRadius.circular(30.0),
                    ),
                    child: Row(
                      children: [
                        Expanded(
                            child: GestureDetector(
                          onTap: () {
                            Navigator.of(context).pushAndRemoveUntil(
                                MaterialPageRoute(
                                    builder: (context) =>
                                        Search(villaList: _villaList)),
                                (route) => true);
                          },
                          child: TextField(
                            decoration: InputDecoration(
                                hintText: "Cari Villa... ",
                                border: InputBorder.none,
                                contentPadding: EdgeInsets.only(left: 20.0),
                                enabled: false),
                          ),
                        )),
                        RaisedButton(
                          elevation: 3.0,
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(30.0),
                          ),
                          onPressed: () {},
                          child: Padding(
                            padding: const EdgeInsets.symmetric(vertical: 15.0),
                            child: Icon(
                              Icons.search,
                              color: Colors.white,
                            ),
                          ),
                          color: Color(0xFFfc6a26),
                        ),
                      ],
                    ),
                  ),
                  SizedBox(
                    height: 20.0,
                  ),
                  //Now let's build the food menu
                  //I'm going to create a custom widget
                  Expanded(
                    child: GridView.builder(
                        gridDelegate: SliverGridDelegateWithMaxCrossAxisExtent(
                            maxCrossAxisExtent: 300,
                            childAspectRatio: 0.7,
                            mainAxisSpacing: 20),
                        itemCount: _villaList.length,
                        itemBuilder: (context, int index) {
                          return GestureDetector(
                            onTap: () {
                              Navigator.of(context).pushAndRemoveUntil(
                                  MaterialPageRoute(
                                      builder: (context) => VillaDetail(
                                          villaList: _villaList, index: index)),
                                  (route) => true);
                            },
                            child: villaCard(
                                "${_villaList[index]['image']}",
                                "${_villaList[index]['namaVilla']}",
                                "${_villaList[index]["harga"]}",
                                "${_villaList[index]["lokasi"]}"),
                          );
                        }),
                  )
                ],
              ),
            ),
          );
  }
}
