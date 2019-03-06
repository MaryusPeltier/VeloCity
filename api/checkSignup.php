<?php
header('Access-Control-Allow-Origin: *');

require "config.php";

// Create database in phpMy admin with user table (id, username, password)

// Connect to database

// fetch user in database with SQL request
$q = $db->prepare("INSERT INTO users (name, lastname, email, username, password) VALUES (:name, :lastname, :email, :username, :password)");
$q->bindParam(":name", $_POST ["name"]);
$q->bindParam(":lastname", $_POST ["lastname"]);
$q->bindParam(":email", $_POST ["email"]);
$q->bindParam(":username", $_POST ["username"]);
$q->bindParam(":password", $_POST ["password"]);
$q->execute();

$data = $q->fetch(PDO::FETCH_ASSOC);

if ($data) {
   echo json_encode($data);

}else{
   echo json_encode ( [] );
}

