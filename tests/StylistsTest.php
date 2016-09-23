<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylists.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistsTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylists::deleteAll();
        }
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
        function test_getAll()
        {
            //Arrange
            $name = "Debra";
            $name1 = "Simone";
            $test_Stylists = new Stylists($name);
            $test_Stylists->save();
            $test_Stylists1 = new Stylists($name1);
            $test_Stylists1->save();

            //Act
            $result = Stylists::getAll();

            //Assert
            $this->assertEquals([$test_Stylists, $test_Stylists1], $result);
        }
        function test_find()
        {
            //Arrange
            $name = "Debra";
            $name1 = "Simone";
            $test_Stylists = new Stylists($name);
            $test_Stylists->save();
            $test_Stylists1 = new Stylists($name1);
            $test_Stylists1->save();

            //Act
            $result = Stylists::find($test_Stylists->getId());

            //Assert
            $this->assertEquals($test_Stylists, $result);
        }

    }

 ?>
