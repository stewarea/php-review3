<?php
    class Client
    {
        private $id;
        private $name;
        private $stylist_id;


        function __construct($id = null, $name, $stylist_id)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }
        function getName()
        {
            return $this->name;
        }
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }
        function setStylistId($new_stylist_id){
            $this->stylist_id = $new_stylist_id;
        }
        function getId()
        {
            return $this->id;
        }
        function save(){
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES (
                '{$this->name}', {$this->stylist_id});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM clients where ID ={$this->getId()};");
        }

        function update($new_name){
            $GLOBALS['DB']->exec("UPDATE clients SET name = '$new_name' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients");
            $clients = array();
            foreach($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $stylist_id = $client['stylist_id'];
                $new_clients = new Client($id, $name, $stylist_id);
                array_push($clients, $new_clients);
            }
            return $clients;
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
}

 ?>
