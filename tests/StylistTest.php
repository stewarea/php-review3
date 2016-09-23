<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }
        function test_getName()
        {
            //Arrange
            $name = "Debra";
            $test_Stylist = new Stylist($name);
            //Act
            $result = $test_Stylist->getName();

            //Assert
            $this->assertEquals($name, $result);


        }

        function test_getId()
            {
            //Arrange
            $name = "Debra";
            $id = 1;
            $test_Stylist = new Stylist($name, $id);

            //Act
            $result = $test_Stylist->getID();

            //ASsert
            $this->assertEquals(true, is_numeric($result));
            }
        function test_getAll()
        {
            //Arrange
            $name = "Debra";
            $name1 = "Simone";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();
            $test_Stylist1 = new Stylist($name1);
            $test_Stylist1->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist1], $result);
        }
        function test_find()
        {
            //Arrange
            $name = "Debra";
            $name1 = "Simone";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();
            $test_Stylist1 = new Stylist($name1);
            $test_Stylist1->save();

            //Act
            $result = Stylist::find($test_Stylist->getId());

            //Assert
            $this->assertEquals($test_Stylist, $result);
        }
        function test_update()
        {
            //Arrange
            $name = "Debra";
            $id = null;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();

            $new_name = "Beard";

            //ACT
            $test_Stylist->update($new_name);

            //Assert
            $this->assertEquals("Beard", $test_Stylist->getName());
        }
        function test_delete()
        {
            //Arrange
            $name = "Debra";
            $id = null;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();

            $name1 = "Simone";
            $test_Stylist1 = new Stylist($name1, $id);
            $test_Stylist1->save();

            //Act
            $test_Stylist->delete();

            //Assert
            $this->assertEquals([$test_Stylist1], Stylist::getAll());
        }


    }

 ?>
