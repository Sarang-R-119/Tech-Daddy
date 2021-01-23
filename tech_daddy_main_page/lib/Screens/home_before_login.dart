import 'package:flutter/material.dart';

import 'before_search.dart';
import 'login_screen.dart';

class HomePageBeforeLogin extends StatelessWidget {
  final String title;
  final String user;

  HomePageBeforeLogin({Key key, this.title, this.user}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
          child: RaisedButton(
        child: Text('Search'),
        onPressed: () {
          Navigator.push(context,
              new MaterialPageRoute(builder: (context) => SearchPage()));
        },
      )),
      appBar: AppBar(
          backgroundColor: Color(0xff821c34),
          title: Row(
            children: <Widget>[
              Image.asset(
                'assets/logo.png',
                height: 55,
                width: 55,
              ),
              Spacer(flex: 2),
              RaisedButton(
                child: Text('Login / Sign up'),
                color: Color(0xffd0532b),
                onPressed: () {
                  Navigator.push(context,
                      new MaterialPageRoute(builder: (context) => LoginPage()));
                },
              )
            ],
            mainAxisAlignment: MainAxisAlignment.start,
          )),
      backgroundColor: Color(0xfff6dad1),
    );
  }
}
