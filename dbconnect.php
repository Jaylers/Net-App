<?php
 class PDOConnect{
  private $host;
  private $userhost;
  private $passhost;
  private $database;
  private $pdo;
 
  public function __construct(){
   $this->host = "localhost";
   $this->userhost = "root";
   $this->passhost = "";
   $this->database = "moviesreview";
  }
 
  public function getConnect(){
   try {
    $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database};charset=UTF8", $this->userhost, $this->passhost);
    $this->pdo->exec("set names utf8");
   } catch (Exception $e) {
    echo $e;
   }
   return $this->pdo;
  }
 }
?>