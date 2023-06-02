<?php

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "medschedke";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

try {
    $pdo = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }