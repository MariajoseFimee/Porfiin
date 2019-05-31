<?php

	$server = 'localhost';
	$username= 'root';
	$password = 'password';
  $database = 'events';
  
  //SERVIDOR MYSQL
  /*$server = '10.42.0.1';
	$username= 'latin';
	$password = 'root';
	$database = 'eventos';*/

  try{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
  }catch (PDOException $e){
    die('Connected failed: '.$e->getMessage());
  }

  $acentos = $conn->query("SET NAMES 'utf8'");
  ?>

