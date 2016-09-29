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
        // protected function tearDown()
        // {
        //     Client::deleteAll();
        // }


        function test_getClientName()
        {
            //Arrange
            $id = null;
            $name = "Evan";
            $stylist_id = 3;
            $test_ClientName = new Client($id, $name, $stylist_id);

            //Act
            $result = $test_ClientName->getName();

            //Assert
            $this->assertEquals($name, $result);

        }

        function test_getId()
        {
            //Arrange
            $id = null;
            $name = "Same";
            $stylist_id = 5;
            $test_client = new Client($id, $name, $stylist_id);
            //Act
            $test_client->save();
            $result = $test_client->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }


        function test_save()
        {
            //Arrange
            $id = null;
            $name = "jim";
            $stylist_id = 5;
            $test_client = new Client($id, $name, $stylist_id);
            //Act
            $test_client->save();
            $result= Client::getAll();
            //Assert
            $this->assertEquals($test_client, $result[0]);
        }
    }
 ?>
