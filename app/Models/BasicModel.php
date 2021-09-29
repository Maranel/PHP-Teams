<?php

namespace App\Models;

class BasicModel {
    
    private $connection;
    private $table;

    public function __construct() {

        // Set table name
        $this->table = strtolower((new \ReflectionClass($this))->getShortName()) . 's';

        // Connection
        $servername = "localhost";
        $tabusername = "root";
        $tabpassword = "";
        $dbname = "mybase";
        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $tabusername, $tabpassword);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // set object connection
            $this->connection = $conn;
            
            $this->setAttributes();
        
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function find($id) {
        $query = $this->connection->prepare("SELECT * FROM $this->table where id=:id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        $query->setFetchMode(\PDO::FETCH_ASSOC);
        foreach ($query->fetch() as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    private function setAttributes() {
        $query = $this->connection->prepare("SHOW COLUMNS FROM $this->table");
        $query->execute();

        $query->setFetchMode(\PDO::FETCH_ASSOC);
        foreach($query->fetchAll() as $attr) {
            $this->{$attr['Field']} = null;
        }
    }

}
