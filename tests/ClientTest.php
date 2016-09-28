<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {


        function test_getClientName()
        {
            //Arrange
            $name = "Evan";
            $stylist_id = 3;
            $test_ClientName = new Client($name, $stylist_id);

            //Act
            $result = $test_ClientName->getName();

            //Assert
            $this->assertEquals($name, $result);

        }
    }
 ?>
