<?php
   
   $servername = "localhost";
   $username = "root";
   $dbname = "gestionscolarite";
   $password = "";

   try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,

    PDO::ERRMODE_EXCEPTION);
   
   }catch(Exception $e){

      $e->getMessage();
      
   }

  
   
?>