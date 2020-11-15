# Tech-Daddy
An online tool to provide users a user friendly database with all of the latest tech products. 
Our combination of an automated, constantly up-to-date database, and AI, we can provide a smart tool 
that can recommend products geared to your specifications and needs. 

# Where do I start?
## Local Webserver Solution
To run this demonstration use xampp or something similar to run a local web server (PHP is a serversided language and requires a webserver to run)

**XAMPP: https://www.apachefriends.org/index.html**
## Starting The Demo
The frontend and the backend are independent and thus the `phprun.php` **file must be run first before loading the frontend**. Otherwise, the frontend will retrieve 0 product results since `phprun.php` is responsible for executing the necessary functions for pulling all the live product data. **To run** `phprun.php` simply navigate to https://localhost/~root/php/phprun.php
where ~root is the name of the directory where this project is saved *(if using xampp, clone this project into your C:\xampp\htdocs)*. 


