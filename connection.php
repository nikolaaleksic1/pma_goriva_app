<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbpma = new PDO("mysql:host=$servername;dbname=pma", $username, $password);
    // set the PDO error mode to exception
    $dbpma->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


 ?>
