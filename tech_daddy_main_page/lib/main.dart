import 'package:flutter/material.dart';

import 'Screens/home_before_login.dart';

void main() => runApp(TechDaddy());

class TechDaddy extends StatelessWidget {
  final appTitle = 'Drawer Demo';

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData(
        primaryColor: Color(0xff821c34),
        canvasColor: Color(0xfff6dad1)
      ),
      title: appTitle,
      home: HomePageBeforeLogin(title: appTitle, user: "user"),
    );
  }
}
