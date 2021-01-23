import 'package:flutter/material.dart';

import 'Screens/home_before_login.dart';

void main() => runApp(TechDaddy());

class TechDaddy extends StatelessWidget {
  final appTitle = 'Drawer Demo';

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: appTitle,
      home: HomePageBeforeLogin(title: appTitle, user: "user"),
    );
  }
}
