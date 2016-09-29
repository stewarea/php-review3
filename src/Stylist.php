<?php
    class Stylist
    {
        private $id;
        private $name;

        function __construct($id = null, $name)
        {

            $this->name = $name;
            $this->id = $id;
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
            $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist");
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
            $GLOBALS['DB']->exec("DELETE FROM stylist;");
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
            $GLOBALS['DB']->exec("UPDATE stylist SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId()};");
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
