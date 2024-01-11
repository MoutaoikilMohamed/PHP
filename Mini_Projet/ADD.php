<?php
// Etablir la connection
session_start();
include("conn.php");

if (isset($_POST["submit"])) {

  $Titre=$_POST["Titre"];
  $Status=$_POST["Priorite"];
  $Priorite=$_POST["Status"];
  $Note=$_POST["Note"];

  // Requete d'insertion SQL

  $sql = "INSERT INTO tache(ID,Titre,Priorite,Status,Date_C,Note) VALUES (NULL, :titre, :priorite,:status, '2023-12-09',:note);";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':titre',$Titre);
  $stmt->bindParam(':priorite',$Priorite);
  $stmt->bindParam(':status',$Status);
  $stmt->bindParam(':note',$Note);
  $stmt->execute();
  $Succ="Tache Bien Ajouté !";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="tailwind.css" rel="stylesheet">

    <title>Tableau de bord</title>
</head>
<body>
    <!-- Creation d'une formulaire simple et structure par un style interne-->
 
              <h1 align="center"style="color:#386AE7;  font-size: 2em;">Ajouter une tache</h1>
              <div class="container">
        <form action ="" method="POST">
            <label for="name">Titre</label>
            <input type="text" id="name" name="Titre" placeholder="">
            <label for="name">Priorite:</label>
            <input type="text" id="name" name="Priorite" placeholder="">
            <label for="text">Status:</label>
            <input type="text" id="email" name="Status" placeholder="">
            <label for="name">Note:</label>
            <input type="name" id="email" name="Note" placeholder="">
            
            <input type="submit" name="submit">
        </form>

    </div>
    <h2 align="center" style="COLOR:green;"><?php if (isset($_POST["submit"])) {
 echo  $Succ;}  ?></h2>
    <style>
      

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: green;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

       
        </style>
  
</body>
</html>
