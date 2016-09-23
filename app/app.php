
<?php
     require_once __DIR__."/../vendor/autoload.php";
     require_once __DIR__."/../src/Stylists.php";
     require_once __DIR__."/../src/Customers.php";

     date_default_timezone_set('America/Los_Angeles');

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

 ?>
