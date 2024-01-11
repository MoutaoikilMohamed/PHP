<?php

session_start();


include("conn.php");

  $stmt = $conn->prepare("SELECT *FROM tache;");

  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  if (isset($_POST["Supprimer"])) {
    $taskIdToDelete = $_POST['Supper'];

    $stmtDelete = $conn->prepare("DELETE FROM tache WHERE id = :Suppr");
    $stmtDelete->bindParam(':Suppr', $taskIdToDelete);
    $stmtDelete->execute();
    header("Location:Dashboard.php");

    
  }

  if (isset($_POST["Modifier"])) {
    $cookie_value =$_POST['taskId'];
  setcookie("TACHE", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  header("Location:MODIFY.php");
  }
  if (isset($_POST["Rechercher"])) {
    $searchTerm = $_POST["searchTerm"];
    $stmt = $conn->prepare("SELECT * FROM tache WHERE ID LIKE :searchTerm OR Titre LIKE :searchTerm OR Priorite LIKE :searchTerm OR Status LIKE :searchTerm OR Date_C LIKE :searchTerm OR Note LIKE :searchTerm;");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="tailwind.css" rel="stylesheet">

    <title>Tableau de bord</title>
</head>
<body>

    
    
    <div align="center">  
           
<img   width=100px height=100px src="user.png">
</div>
              <h1 align="center"style="color:#386AE7;  font-size: 2em;">Liste des Taches</h1>
              <div align="center">  
                     
              <a href="ADD.php"><img align="center" src="plus.png" width="50px" height="50pX"></a> 
              </div>

              <form method="POST" action="">
              <input type="text" id="name" name="Supper" placeholder="Tache à supprimer">
    <button class="buttonR" name="Supprimer">Supprimer</button> </form><br><br><br>
    <form method="POST" action="">
        <div  align="center" class="search-container">
            <input type="text" class="search-box" name="searchTerm" placeholder="Rechercher...">
            <button class="search-button" name="Rechercher" type="submit">Rechercher</button>
        </div>
    </form>
            <table id="Tableau">
  <tr>
    <th width="30px">ID</th>
    <th width="100px">`Titre</th>
    <th width="200px">Priorite</th>
    <th>Status</th>
    <th>Date_C</th>
    <th width="600px">Note</th>
    <th width="200px">Operation</th>


    <?php
 
        while ($row = $stmt->fetch()) {

            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Titre'] . "</td>";
            echo "<td>" . $row['Priorite'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td>" . $row['Date_C'] . "</td>";
            echo "<td>" . $row['Note'] . "</td>";
            
        
        
            if (isset($_POST["Rechercher"])) {
              echo "<h2>Résultats de la recherche :</h2>";
              echo "<table id='Tableau'>";
              echo "<tr>
                      <th width='30px'>ID</th>
                      <th width='100px'>Titre</th>
                      <th width='200px'>Priorite</th>
                      <th>Status</th>
                      <th>Date_C</th>
                      <th width='600px'>Note</th>
                      <th width='200px'>Operation</th>
                    </tr>";
          
              while ($row = $stmt->fetch()) {
                  echo "<tr>";
                  echo "<td>" . $row['ID'] . "</td>";
                  echo "<td>" . $row['Titre'] . "</td>";
                  echo "<td>" . $row['Priorite'] . "</td>";
                  echo "<td>" . $row['Status'] . "</td>";
                  echo "<td>" . $row['Date_C'] . "</td>";
                  echo "<td>" . $row['Note'] . "</td>";
                  echo "<td><form method='POST' action=''>
                        <input type='hidden' name='taskId' value='" . $row['ID'] . "'>
                        <button class='buttonG' name='Modifier' type='Submit'>Modifier</button></form></td>";
                  echo "</tr>";
              }
          
              echo "</table>";
          }
    ?>
    <td>
        <form method="POST" action="">
        <input type='hidden' name='taskId' value="<?php echo $row['ID'] ?>">
<button class="buttonG" name="Modifier" type="Submit">Modifier</button></td>
    <tr></form>
        <?php } ?>

</table>
    </body>




 


 
 
<style>
#Tableau {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#Tableau td, #Tableau th {
  border: 1px solid #ddd;
  padding: 8px;
}


#Tableau th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #89B8CD;
  color: white;
}
.buttonR {
  background-color: Red; 
  color: white;
  padding: 10px 32px;
  text-align: center;
}
.buttonG {
  background-color: Green; 
  color: white;
  padding: 10px 32px;
  text-align: center;
}
.search-box {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 190px;
            margin-right: 10px;
            font-size: 16px;
        }

        .search-button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
</style>
                
                
                

                
            </section>
        </main>
    </div>
</body>
</html>
