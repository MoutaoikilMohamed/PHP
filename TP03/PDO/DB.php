<?php
 $servername = "localhost";
 $username = "root";
 $password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE mydatabase";
  $conn->exec($sql);
  echo "Base de données bien créer";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>