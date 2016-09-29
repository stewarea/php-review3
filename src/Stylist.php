<?php
    class Stylist
    {
        private $id;
        private $name;

        function __construct ($id=null, $name)
        {
            $this->id = $id;
            $this->name = $name;
        }
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }
        function getName()
        {
            return $this->name;
        }
        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $new_stylists = new Stylist($id, $name);
                array_push($stylists, $new_stylists);
            }
            return $stylists;
        }
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
        static function find($search_id)
        {
            $found_stylists = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id) {
                    $found_stylists = $stylist;
                }
                return $found_stylists;
            }

        }
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        }

        function getClients(){
            $all_clients = Client::getAll();
            $matched_clients = array();
            foreach($all_clients as $client){
                if($client->getStylistId() == $search_id){
                    array_push($matched_clients, $client);
                }
            }
            return $matched_clients;
        }

    }
 ?>
