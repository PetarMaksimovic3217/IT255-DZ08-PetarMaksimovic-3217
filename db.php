<?php
//$db = mysqli_connect("localhost", "root", "", "agencija");
     $server = 'localhost';
     $username = 'root';
     $password = '';
     $database = 'methotel';
try{

    	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);


} catch(PDOException $e){
			die("Konekcija nije uspela: ".$e->getMessage());
}
?>﻿
