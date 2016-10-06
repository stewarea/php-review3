Salon Manager

This app allows the user to enter, edit, and delete stylist information and clients for the stylist. This project explores one-to-many relationships, as each client will only belong to one client, and is a practice in CRUD functionality. Version:28/Sept/2016

Author: Evan Stewart (github:stewarea) Desciption

Required technologies:

HTML, PHP, CSS, Twig, Silex, Css, Atom, php-twig extension in Atom Notes
Must install composer in project directory to access the composer.json file and vendor folder and corresponding files. https://getcomposer.org/ License


## Setup/Installation Requirements

* _Clone this repository to your desktop_
* _Run composer install from root_
* _Navigate to the web folder and begin your local server (php -S localhost:8000)_
* _Begin MAMP_
* _Iinitialize new Database by doing the following:_
* _Begin MySql Shell by running $ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot_
* _CREATE DATABASE hair_salon;_
* _USE hair_salon;_
* _CREATE TABLE stylists(id serial PRIMARY KEY, name VARCHAR(255));_
* _CREATE TABLE clients(id, serial PRIMARY KEY, name VARCHAR(255));_
* _Alternatively, unzip the database contained at the top level of this folder and import from phpmyadmin;_ (http://localhost:8888/phpmyadmin/_
* _in phpmyadmin, you may also have to create another database for use with phpunit tests files by going to Operations>;_
* _Copy Database To> and remaning database "hair_salon_test" and choosing "structure only"_
* _Change localhost routing in app.php (and php documents in tests folder) to localhost enabled for mySQL.  _mysql:...host=localhost:8889;dbname=....in MAMP, you can find this by going to MAMP > Preferences > Ports> MySql Port_

* _In terminal, navigate to_
* _Open Browser and navigate to http://localhost:8000_

Copyright (c) 2016 Evan Stewart This software is licensed under the MIT license_
