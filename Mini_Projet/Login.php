<?php


    session_start();
    $login_error = "";

    if(isset($_SESSION["user"])){
        header("Location:Dashboard.php");
    }

    if(isset($_POST["login"])){
        include("conn.php");
        
        $ID = $_POST['ID'];
        $password = $_POST['password'];
    
        $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE ID_USER = :ID AND Password = :password");
    
        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':password', $password);
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
        $stmt->execute();
    
        
        if ($stmt->rowCount() > 0) {

            $_SESSION["user"] = $stmt->fetch();
            $_SESSION["ID"] = $_POST['ID'];

            header("Location:Dashboard.php");
            exit(); 
        } else {
            $login_error = "Utilisateur n'existe pas";
        }
    }
     
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>inscription</title>
 
  
    
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div align="center">
    <img src="profile.png">
</div>
<div class="container">

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <h3>Authentification</h3>
        <label for="email">ID </label>
        <input type="text" placeholder="CNE" id ="CNE" name="ID">

        <label for="password">Mot de pass</label>
        <input type="password" placeholder="Mot de pass" id="password" name="password">

        <input type="submit" name="login" value="connection">
       
        <?php if($login_error !== "") : ?>
        <b ><h5 align="center"><?php echo htmlspecialchars($login_error); ?></h5></b>
        <?php endif;?>
        
    </form>
    </div>
   <style>  .container {
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
            background-color: blue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
</style>
</body>
</html>
