<?php

namespace App\Models;

use App\Models\Table;

class BasicModel {
    
    private $config;
    private $connection;

    public function __construct($attributes = null) {

        // Set table name
        $this->config['table'] = new Table(strtolower((new \ReflectionClass($this))->getShortName()) . 's');

        // Connection
        $servername = "localhost";
        $tabusername = "root";
        $tabpassword = "";
        $dbname = "mybase";
        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $tabusername, $tabpassword);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // set object connection
            $this->config['connection'] = $conn;
            
            $this->setAttributes($attributes);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function find($id) {
        $query = $this->config['connection']->prepare("SELECT * FROM ". $this->config['table']->getName()." where id=:id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        $query->setFetchMode(\PDO::FETCH_ASSOC);
        foreach ($query->fetch() as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    private function setAttributes($attributes = null) {
        $query = $this->config['connection']->prepare("SHOW COLUMNS FROM ". $this->config['table']->getName()."");
        $query->execute();

        $query->setFetchMode(\PDO::FETCH_ASSOC);
        foreach($query->fetchAll() as $attr) {
            $this->{$attr['Field']} = $attributes[$attr['Field']] ?? null;
        }
    }

    public function update() {
        $queryString = "UPDATE " .$this->config['table']->getName().  " SET ";
        $attrs = get_object_vars($this);
        foreach($attrs as $attribute_name => $attribute_value) {
            if($attribute_name != 'config' && $attribute_name != 'connection') {
                $queryString .= $attribute_name. '=:'. $attribute_name . ', ';
            }
        }
        $queryString = rtrim($queryString,", ");
        $queryString .= ' WHERE id=:id';
        $query = $this->config['connection']->prepare($queryString);
        foreach($attrs as $attribute_name => $attribute_value) {
            if($attribute_name !== 'config' ) {
                $query->bindParam(':'.$attribute_name, $this->$attribute_name);
            }
        }
        $query->execute();
        return $this->find($this->id);
    }

    public function all() {
        $query = $this->config['connection']->prepare("SELECT * FROM ". $this->config['table']->getName());
        $query->execute();

        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $collection = [];
        $class = get_class($this);
        foreach ($query->fetchAll() as $key => $value) {
            $collection[] = new $class($value); 
        }
        return $collection;
    }

}
