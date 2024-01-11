<?php
   $servername = "localhost";
   $username = "root";
   $dbname = "mydatabase";
   $password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE comments (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    post_id INTEGER,
    firstname VARCHAR(30),
    comment TEXT,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

  $conn->exec($sql);
  echo "La table est bien créer";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>