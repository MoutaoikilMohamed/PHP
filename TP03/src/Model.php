<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $dbname = "mydatabase";
    $password = "";
try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
}






function CreateDB(){

    try {
        $conn = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root',
        '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE mydatabase";
        $conn->exec($sql);
        echo "Base de données bien créer";
      } catch(PDOException $e) {
         echo "* Base de données deja créer ";      }
      
      $conn = null;
}



function CreateTable(){
try {
  $conn = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root',
  '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE MyGuests(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $conn->exec($sql);
  echo "La table est bien créer";
} catch(PDOException $e) {
  echo "/ Table est deja créer";
}
$conn = null;
}




 function getPosts() {
  try
  {
 $bdd = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root',
 ''); }
  catch(Exception $e){
  die( 'Erreur : '.$e->getMessage() ); }
  $statement = $bdd->query('SELECT id, firstname, lastname,
 DATE_FORMAT(reg_date, \'%d/%m/%Y à %Hh%imin%ss\') AS
 date_visite_fr FROM myguests ORDER BY reg_date DESC LIMIT 0, 5');
  $posts = [];
  while (($row = $statement->fetch())) {
  $post = [
  'id' => $row['id'],

  'firstname' => $row['firstname'],
  'lastname' => $row['lastname'],
  'french_visite_date' => $row['date_visite_fr'], ];
  $posts[] = $post; }
  
  return $posts;
 }



 function getComment() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $statement = $bdd->query('SELECT * FROM comments;');
    $comments = []; 

    while (($row = $statement->fetch())) {
        $comment = [
            'id' => $row['id'],
            'post_id' => $row['post_id'],
            'firstname' => $row['firstname'],
            'comment' => $row['comment'],
            'comment_date' => $row['comment_date'],
        ];
        $comments[] = $comment; 
    }
    return $comments;
}
 ?>
   