<?php

class Gestor {

  private $host;
  private $user;
  private $pass;
  private $db;

  function __construct($host, $user, $pass){
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
  }

  function __call($method, $args){
    if($method == 'connect'){
      if(count($args) == 0){
        $this->db = new mysqli($this->host, $this->user, $this->pass);
        return $this->db;
      }
      else if(count($args) == 1){
        $this->db = new mysqli($this->host, $this->user, $this->pass, $args[0]);
        return $this->db;
      }
    }
  }

  //true si no hubo errores
  function createDB(){
    $query = "CREATE DATABASE IF NOT EXISTS gestor COLLATE utf8_spanish_ci";
    return $this->db->query($query);
  }

  function createTable($query){
    return $this->db->query($query);
  }

  function closeConnection(){
    $this->db->close();
  }

}

?>
