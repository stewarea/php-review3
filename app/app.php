
<?php
     require_once __DIR__."/../vendor/autoload.php";
     require_once __DIR__."/../src/Stylist.php";
     require_once __DIR__."/../src/Client.php";

     date_default_timezone_set('America/Los_Angeles');

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/", function() use ($app){
        $new_stylist = new Stylist(null, $_POST['stylist']);
        $new_stylist->save();
        return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylist/{id}", function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        $found_clients  = $found_stylist->getClients($id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $found_stylist, 'clients' => $found_clients, 'stylists' => Stylist::getAll()));
    });

    $app->delete("/delete/{id}", function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        $found_stylist->delete();
      return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->patch("/{id}/edit", function($id) use ($app) {
        $found_stylist= Stylist::find($id);
        $found_stylist->update($_POST['name']);
      return $app['twig']->render('home.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/stylist/{id}", function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        $new_client = new Client (null, $_POST['name'], $_POST['last_appointment'], $_POST['next_appointment'], $_POST['stylist_id']);
        $new_client->save();
        $found_clients  = $found_stylist->getClients($id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $found_stylist, 'clients' => $found_clients, 'stylists' => Stylist::getAll()));
    });




    return $app;

 ?>
