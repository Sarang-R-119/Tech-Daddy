import 'package:flutter/material.dart';

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

class HomePageBeforeLogin extends StatelessWidget {
  final String title;
  final String user;

  HomePageBeforeLogin({Key key, this.title, this.user}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
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
              RaisedButton(child: Text('Login / Sign up'), color: Color(0xffd0532b), onPressed: () {},)
            ],
            mainAxisAlignment: MainAxisAlignment.start,
          )),
      backgroundColor: Color(0xfff6dad1),
    );
  }
}

class HomePagePostLogin extends StatelessWidget {
  final String title;
  final String user;

  HomePagePostLogin({Key key, this.title, this.user}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Image.asset(
          'assets/logo.png',
          height: 55,
          width: 55,
        ),
        backgroundColor: Color(0xff821c34),
      ),
      body: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.end,
          children: <Widget>[
            new Container(
              color: Color(0xfff6dad1),
              child: new Image.asset('assets/icon1.ico'),
              width: 200,
              height: 200,
            ),
            new Container(
              color: Color(0xfff6dad1),
              child: new Image.asset('assets/icon1.ico'),
              width: 200,
              height: 200,
            ),
          ]),
      backgroundColor: Color(0xfff6dad1),
      endDrawer: Drawer(
        // Add a ListView to the drawer. This ensures the user can scroll
        // through the options in the drawer if there isn't enough vertical
        // space to fit everything.
        child: ListView(
          // Important: Remove any padding from the ListView.
          padding: EdgeInsets.zero,
          children: <Widget>[
            DrawerHeader(
              child: Text('Hello, ' + user),
              decoration: BoxDecoration(
                color: Color(0xff821c34),
              ),
            ),
            ListTile(
              title: Text('History'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Preferences'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Inventory Page'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Auto Recommendation'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Settings'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Customer Service'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Comparisons'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Bookmarks'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
          ],
        ),
      ),
    );
  }
}
