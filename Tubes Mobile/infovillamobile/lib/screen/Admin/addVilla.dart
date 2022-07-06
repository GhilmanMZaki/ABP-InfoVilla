import 'package:flutter/material.dart';
import 'package:file_picker/file_picker.dart';
import 'package:infovillamobile/services/villa_services.dart';

import '../../global.dart';
import '../../model/ApiResponse.dart';
import 'dart:io';

import '../../services/user_services.dart';
import '../login.dart';

class AddVilla extends StatefulWidget {
  AddVilla({Key? key}) : super(key: key);

  @override
  State<AddVilla> createState() => _AddVillaState();
}

class _AddVillaState extends State<AddVilla> {
  TextEditingController nameVillaController = TextEditingController();
  TextEditingController lokasiController = TextEditingController();
  TextEditingController deskripsiController = TextEditingController();
  TextEditingController hargaController = TextEditingController();
  bool loading = false;
  final GlobalKey<FormState> _formkey = GlobalKey<FormState>();
  bool _loading = false;

  // Future getImage() async {
  //   final selectedImage = ImagePicker().pickImage(source: ImageSource.gallery);
  //   if (selectedImage != null) {
  //     setState(() {
  //       _image = selectedImage;
  //       fileName = File(_image!.path) as String;
  //     });
  //   }
  // }

  void _createVilla() async {
    ApiResponse response = await createVilla(nameVillaController.text,
        lokasiController.text, deskripsiController.text, hargaController.text);
    if (response.error == null) {
      Navigator.of(context).pop();
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('Villa Berhasil diupload')));
    } else if (response.error == unauthorized) {
      logout().then((value) => {
            Navigator.of(context).pushAndRemoveUntil(
                MaterialPageRoute(builder: (context) => Login()),
                (route) => false)
          });
    } else {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('${response.error}')));
      setState(() {
        _loading = !_loading;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Add New Villa'),
        centerTitle: true,
      ),
      body: Padding(
          padding: EdgeInsets.all(10),
          child: Form(
              key: _formkey,
              child: ListView(
                children: <Widget>[
                  Container(
                    padding: const EdgeInsets.all(10),
                    child: TextFormField(
                        controller: nameVillaController,
                        decoration: const InputDecoration(
                          border: OutlineInputBorder(),
                          labelText: 'Nama Villa',
                        ),
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Nama Villa Tidak Boleh Kosong';
                          }
                          return null;
                        }),
                  ),
                  Container(
                    padding: const EdgeInsets.all(10),
                    child: TextFormField(
                        controller: lokasiController,
                        decoration: const InputDecoration(
                          border: OutlineInputBorder(),
                          labelText: 'Lokasi',
                        ),
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Lokasi Tidak Boleh Kosong';
                          }
                          return null;
                        }),
                  ),
                  Container(
                    padding: const EdgeInsets.all(10),
                    child: TextFormField(
                        maxLines: null,
                        controller: deskripsiController,
                        decoration: const InputDecoration(
                          border: OutlineInputBorder(),
                          labelText: 'Deskripsi',
                        ),
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Deskripsi Tidak Boleh Kosong';
                          }
                          return null;
                        }),
                  ),
                  Container(
                    padding: const EdgeInsets.all(10),
                    child: TextFormField(
                        controller: hargaController,
                        decoration: const InputDecoration(
                          border: OutlineInputBorder(),
                          labelText: 'Harga',
                        ),
                        validator: (value) {
                          if (value == null || value.isEmpty) {
                            return 'Harga Tidak Boleh Kosong';
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
                          child: const Text('Choose Image'),
                          onPressed: () async {
                            final result = await FilePicker.platform.pickFiles(
                                allowMultiple: false,
                                type: FileType.custom,
                                allowedExtensions: ['png', 'jpg', 'jpeg']);

                            if (result == null) {
                              ScaffoldMessenger.of(context).showSnackBar(
                                  const SnackBar(
                                      content: Text('No Image Selected')));
                              return null;
                            }
                            ;
                            final path = result.files.single.path;
                            final fileName = result.files.single.name;

                            print(path);
                            print(fileName);
                          })),
                  SizedBox(
                    height: 10,
                  ),
                  Container(
                      height: 50,
                      padding: const EdgeInsets.fromLTRB(10, 0, 10, 0),
                      child: ElevatedButton(
                        child: const Text('Add Villa'),
                        onPressed: () {
                          if (_formkey.currentState!.validate()) {
                            setState(() {
                              _createVilla();
                              loading = true;
                            });
                          }
                          ;
                        },
                      ))
                ],
              ))),
    );
  }
}
