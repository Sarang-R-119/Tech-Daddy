import 'dart:ui';

import 'package:flutter/material.dart';

class LoginPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        resizeToAvoidBottomInset: false,
        appBar: AppBar(
          backgroundColor: Color(0xff821c34),
        ),
        backgroundColor: Color(0xfff6dad1),
        body: Column(
          children: <Widget>[
            Container(
              margin: EdgeInsets.only(top: 60),
              child: Center(
                  child: Container(
                child: new Image.asset('assets/logo.png'),
                width: 200,
                height: 200,
              )),
            ),
            Container(
              width: 300,
              child: Center(
                child: TextField(
                  obscureText: true,
                  decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Username',
                      hintText: 'Enter your username',
                  ),
                ),
              ),
            ),
            Container(
              width: 300,
              child: Center(
                child: TextField(
                  obscureText: true,
                  decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Password',
                      hintText: 'Enter your secure password'),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
