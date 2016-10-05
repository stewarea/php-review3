Salon Manager

This app allows the user to enter, edit, and delete stylist information and clients for the stylist. This project explores one-to-many relationships, as each client will only belong to one client, and is a practice in CRUD functionality. Version:28/Sept/2016

Author: Evan Stewart (github:stewarea) Desciption

Required technologies:

HTML, PHP, CSS, Twig, Silex, Css, Atom, php-twig extension in Atom Notes
Must install composer in project directory to access the composer.json file and vendor folder and corresponding files. https://getcomposer.org/ License


Setup/Installation

Clone this repository to your desktop
Run composer install from root
Navigate to the web folder and begin your local server (php -S localhost:8000)
Begin MAMP
Iinitialize new Database by doing the following:
Begin MySql Shell by running $ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
CREATE DATABASE hair_salon
USE hair_salong
CREATE TABLE stylists(id serial PRIMARY KEY, name VARCHAR(255))
CREATE TABLE clients(id, serial PRIMARY KEY, name VARCHAR(255))
Alternatively, unzip the database contained at the top level of this folder and import from phpmyadmin (http://localhost:8888/phpmyadmin/)
in phpmyadmin, you may also have to create another database for use with phpunit tests files by going to Operations> Copy Database To> and remaning database "hair_salon_test" and choosing "structure only"

Change localhost routing in app.php (and php documents in tests folder) to localhost enabled for mySQL. ex mysql:...host=localhost:8889;dbname=....in MAMP, you can find this by going to MAMP > Preferences > Ports> MySql Port

_In terminal, navigate to _
Open Browser and navigate to http://localhost:8000

Copyright (c) 2016 Evan Stewart This software is licensed under the MIT license.
