<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }
        function test_getName()
        {
            //Arrange
            $id = null;
            $name = "Debra";
            $test_Stylist = new Stylist($id, $name);
            //Act
            $result = $test_Stylist->getName();

            //Assert
            $this->assertEquals($name, $result);


        }

        function test_getId()
            {
            //Arrange
            $name = "Debra";
            $id = null;
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();
            //Act
            $result = $test_Stylist->getId();

            //ASsert
            $this->assertEquals(true, is_numeric($result));
            }
        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "Debra";
            $id1 = null;
            $name1 = "Simone";
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();
            $test_Stylist1 = new Stylist($id1, $name1);
            $test_Stylist1->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist1], $result);
        }
        function test_save()
        {
            //Arrange
            $id = null;
            $name = "Simone";
            $test_Category = new Stylist($id, $name);
            $test_Category->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_Category, $result[0]);
        }

        function test_find()
        {
            //Arrange
            $id = null;
            $name = "Debra";
            $id1 = null;
            $name1 = "Simone";
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();
            $test_Stylist1 = new Stylist($id1, $name1);
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
            $test_Stylist = new Stylist($id, $name);
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
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();

            $name1 = "Simone";
            $id1 = null;
            $test_Stylist1 = new Stylist($id, $name1);
            $test_Stylist1->save();

            //Act
            $test_Stylist->delete();

            //Assert
            $this->assertEquals([$test_Stylist1], Stylist::getAll());
        }

        function test_getClients()
        {
            //Arrange
            $name = "Debra";
            $id = null;
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();

            $name = "Beard";
            $id = null;
            $test_Stylist = new Stylist($id, $name);
            $test_Stylist->save();

            $name1 = "Sam";
            $id1 = 2;
            $stylist_id = null;
            $new_client = new Client($id1, $name1, $stylist_id);
            $new_client->save();
            //Act
            $found_clients = Stylist::getClients(2);
            $result = $found_clients[0];
            //Assert
            $this->assertEquals($test_client, $result);
        }
    }
?>
