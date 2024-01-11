    

    <?php
    $servername = "localhost";
    $username = "root";
    $dbname = "mydatabase";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
?>