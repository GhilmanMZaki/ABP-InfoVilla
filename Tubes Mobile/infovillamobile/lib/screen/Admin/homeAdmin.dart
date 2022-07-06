import 'package:flutter/material.dart';
import 'package:infovillamobile/screen/Admin/addVilla.dart';
import 'package:infovillamobile/screen/Admin/reviewAdmin.dart';
import 'package:infovillamobile/screen/Admin/villaAdmin.dart';
import 'package:infovillamobile/screen/login.dart';
import 'package:infovillamobile/screen/profile.dart';
import 'package:infovillamobile/screen/villa_screen.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:convert';

import '../../services/user_services.dart';

class HomeAdmin extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<HomeAdmin> {
  int currentIndex = 0;
  ThemeData light = ThemeData(
    brightness: Brightness.light,
    primaryColor: Colors.green,
    primarySwatch: Colors.green,
    outlinedButtonTheme: OutlinedButtonThemeData(
      style: OutlinedButton.styleFrom(
        primary: Colors.black,
        side: BorderSide(
          color: Colors.black,
          width: 2,
        ),
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(50),
        ),
      ),
    ),
  );
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: light,
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar:
            AppBar(title: Text("Dashboard Admin"), centerTitle: true, actions: [
          IconButton(
            icon: Icon(Icons.exit_to_app),
            onPressed: () {
              logout().then((value) => {
                    Navigator.of(context).pushAndRemoveUntil(
                        MaterialPageRoute(builder: (context) => Login()),
                        (route) => false)
                  });
            },
          )
        ]),
        body: Center(
          child: currentIndex == 0 ? VillaAdmin() : ReviewAdmin(),
        ),
        floatingActionButton: FloatingActionButton(
            onPressed: () {
              Navigator.of(context).push(
                MaterialPageRoute(builder: (context) => AddVilla()),
              );
            },
            child: Icon(Icons.add)),
        bottomNavigationBar: BottomNavigationBar(
            items: const <BottomNavigationBarItem>[
              BottomNavigationBarItem(
                icon: Icon(Icons.home),
                label: 'Villa',
              ),
              BottomNavigationBarItem(
                icon: Icon(Icons.rate_review),
                label: 'Review',
              ),
            ],
            currentIndex: currentIndex,
            onTap: (val) {
              setState(() {
                currentIndex = val;
              });
            }),
      ),
    );
  }
}
