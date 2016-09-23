<?php
    require_once "src/Stylists.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistsTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylists::deleteAll();
        // }
        function test_getName()
        {
            //Arrange
            $name = "Debra";
            $test_Stylists = new Stylists($name);
            //Act
            $result = $test_Stylists->getName();

            //Assert
            $this->assertEquals($name, $result);


        }

        function test_getId()
        {
        //Arrange
        $name = "Debra";
        $id = 1;
        $test_Stylists = new Stylists($name, $id);

        //Act
        $result = $test_Stylists->getID();

        //ASsert
        $this->assertEquals(true, is_numeric($result));
        }
    }

 ?>
