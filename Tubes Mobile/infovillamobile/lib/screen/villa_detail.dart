import 'package:flutter/material.dart';
import 'package:infovillamobile/model/ApiResponse.dart';
import 'package:infovillamobile/screen/review.dart';
import 'package:infovillamobile/services/review_services.dart';
import 'package:readmore/readmore.dart';

import '../global.dart';
import '../services/user_services.dart';
import 'login.dart';

class VillaDetail extends StatefulWidget {
  final List<dynamic>? villaList;
  final int? index;
  VillaDetail({Key? key, this.villaList, this.index}) : super(key: key);

  @override
  State<VillaDetail> createState() => _VillaDetailState();
}

class _VillaDetailState extends State<VillaDetail> {
  List<dynamic> _reviewList = [];
  int userId = 0;
  bool _loading = true;
  Future<void> getReview() async {
    userId = await getUserId();
    ApiResponse response =
        await getReviewVilla(widget.villaList![widget.index!]['id']);

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
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('${response.error}')));
    }
  }

  @override
  void initState() {
    getReview();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('InfoVilla'),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Container(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Image.network(
                "${widget.villaList![widget.index!]['image']}",
                height: 400,
                width: 500,
                fit: BoxFit.cover,
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: RichText(
                  text: TextSpan(
                    children: [
                      TextSpan(
                        text:
                            "${widget.villaList![widget.index!]['namaVilla']}",
                        style: TextStyle(
                            fontSize: 28,
                            fontWeight: FontWeight.bold,
                            color: Colors.black),
                      ),
                      TextSpan(
                          text: " | ",
                          style: TextStyle(fontSize: 30, color: Colors.black)),
                      WidgetSpan(
                          child: Icon(
                        Icons.star,
                        color: Colors.orange,
                        size: 28,
                      )),
                      TextSpan(
                          text:
                              ' ${widget.villaList![widget.index!]['rating']}',
                          style: TextStyle(
                              fontSize: 26,
                              fontWeight: FontWeight.bold,
                              color: Colors.black))
                    ],
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: Text(
                  "Rp. ${widget.villaList![widget.index!]['harga']}",
                  style: TextStyle(
                      fontSize: 22,
                      fontWeight: FontWeight.w400,
                      color: Colors.black),
                ),
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 7),
                child: RichText(
                  text: TextSpan(
                    children: [
                      WidgetSpan(
                          child: Icon(
                        Icons.location_on,
                        color: Colors.green,
                        size: 25,
                      )),
                      TextSpan(
                          text: '${widget.villaList![widget.index!]['lokasi']}',
                          style: TextStyle(fontSize: 20, color: Colors.black))
                    ],
                  ),
                ),
              ),
              Divider(
                thickness: 5,
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: Text(
                  "Deskripsi Villa",
                  style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                ),
              ),
              Container(
                width: MediaQuery.of(context).size.width,
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: Column(
                  children: [
                    ReadMoreText(
                      "${widget.villaList![widget.index!]['deskripsi']}",
                      trimLines: 5,
                      textAlign: TextAlign.justify,
                      trimMode: TrimMode.Line,
                      trimCollapsedText: " Show More ",
                      trimExpandedText: " Show less ",
                      lessStyle: TextStyle(
                          fontSize: 13,
                          fontWeight: FontWeight.bold,
                          color: Colors.green),
                      moreStyle: TextStyle(
                          fontSize: 13,
                          fontWeight: FontWeight.bold,
                          color: Colors.green),
                    ),
                  ],
                ),
              ),
              Divider(
                thickness: 5,
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: Text(
                  "Review Villa",
                  style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                ),
              ),
              SizedBox(
                height: 65 * _reviewList.length.toDouble(),
                child: ListView.builder(
                    itemCount: _reviewList.length,
                    itemBuilder: (context, index) {
                      return ListTile(
                        title:
                            Text("${_reviewList[index]['user']['username']}"),
                        subtitle: Text("${_reviewList[index]['review']}"),
                        trailing: RichText(
                            text: TextSpan(children: [
                          WidgetSpan(
                              child: Icon(
                            Icons.star,
                            size: 20,
                            color: Colors.amber,
                          )),
                          TextSpan(
                              text: '${_reviewList[index]['rating']}',
                              style: TextStyle(color: Colors.black))
                        ])),
                        leading: Icon(Icons.people),
                      );
                    }),
              ),
              Divider(
                thickness: 5,
              ),
              Padding(
                padding: const EdgeInsets.fromLTRB(7, 2, 2, 4),
                child: FloatingActionButton.extended(
                    icon: Icon(Icons.holiday_village),
                    label: Text("Rate Villa"),
                    onPressed: () {
                      Navigator.of(context).pushAndRemoveUntil(
                          MaterialPageRoute(
                              builder: (context) => ReviewPost(
                                  villaId: widget.villaList![widget.index!]
                                      ['id'])),
                          (route) => true);
                    }),
              )
            ],
          ),
        ),
      ),
    );
  }
}
