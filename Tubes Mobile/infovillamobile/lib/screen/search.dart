import 'package:flutter/material.dart';
import 'package:infovillamobile/screen/villa_detail.dart';

class Search extends StatefulWidget {
  final List<dynamic>? villaList;
  Search({Key? key, this.villaList}) : super(key: key);

  @override
  State<Search> createState() => _SearchState();
}

class _SearchState extends State<Search> {
  late List<dynamic> searchList = widget.villaList!;
  void updateList(String value) {
    setState(() {
      searchList = widget.villaList!
          .where((element) => element['namaVilla']
              .toString()
              .toLowerCase()
              .contains(value.toLowerCase()))
          .toList();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('InfoVilla'), centerTitle: true),
      body: Padding(
        padding: EdgeInsets.all(16),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              "Cari Villa Pilihan Anda",
              style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 20),
            TextField(
              onChanged: (value) => updateList(value),
              decoration: InputDecoration(
                  filled: true,
                  border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(8),
                      borderSide: BorderSide.none),
                  hintText: "eg : Villa Bandung Indah",
                  prefixIcon: Icon(Icons.search)),
            ),
            SizedBox(
              height: 20,
            ),
            Expanded(
                child: searchList.length == 0
                    ? Center(
                        child: Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Icon(Icons.do_not_disturb),
                          Text(
                            "Villa yang kamu cari belum terdaftar",
                            style: TextStyle(
                                fontWeight: FontWeight.bold, fontSize: 22),
                          ),
                        ],
                      ))
                    : ListView.builder(
                        itemCount: searchList.length,
                        itemBuilder: (context, index) {
                          return ListTile(
                            contentPadding: EdgeInsets.all(8),
                            title: Text(
                              "${searchList[index]['namaVilla']}",
                              style: TextStyle(fontWeight: FontWeight.bold),
                            ),
                            subtitle: Text(
                              "${searchList[index]['lokasi']}",
                            ),
                            trailing: RichText(
                                text: TextSpan(children: [
                              WidgetSpan(
                                  child: Icon(
                                Icons.star,
                                size: 20,
                                color: Colors.orange,
                              )),
                              TextSpan(
                                  text: '${searchList[index]['rating']}',
                                  style: TextStyle(color: Colors.black))
                            ])),
                            leading: Image.network(
                              "${searchList[index]['image']}",
                              width: 100,
                              height: 100,
                              fit: BoxFit.cover,
                            ),
                            onTap: () {
                              Navigator.of(context).pushAndRemoveUntil(
                                  MaterialPageRoute(
                                      builder: (context) => VillaDetail(
                                          villaList: searchList, index: index)),
                                  (route) => true);
                              ;
                            },
                          );
                        }))
          ],
        ),
      ),
    );
  }
}
