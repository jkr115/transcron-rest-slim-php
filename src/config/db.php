<?php

  class db{
    public $dbHost;
    public $dbUser;
    public $dbPass;
    public $dbName;
    
    function __construct() {
      $this->dbHost = $_SERVER['DB_HOST'];
      $this->dbUser = $_SERVER['DB_USER'];
      $this->dbPass = $_SERVER['DB_PASS'];
      $this->dbName = $_SERVER['DB_NAME'];
    }

    //conección
    public function conectDB(){
      $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
      $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
      $dbConnecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnecion;
    }
  }
