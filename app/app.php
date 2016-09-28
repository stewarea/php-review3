
<?php
     require_once __DIR__."/../vendor/autoload.php";
     require_once __DIR__."/../src/Stylist.php";
     require_once __DIR__."/../src/Client.php";

     date_default_timezone_set('America/Los_Angeles');

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        return $app['twig']->render('home.html.twig');
    });

    $app->get("/stylists", function () use ($app){
        return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    return $app;

 ?>
