
<!-- C'est nécessaire de créer un dossier nomme 'uploads' dans votre répertoire dans lequelle vous pouver stocker Les fichier -->


<html>
 <!--Création d'une form Html structuré avec des styles interne  -->

<h1 align="center" style="color : Orange;">Uploader Un PDF<h1>
    <br>
<form action="" method="POST" align="center" enctype="multipart/form-data">
    <input type="file" name="FilePD">
    <input type="submit" name="submit" value="Uploader">
</form>
<?php
if (isset($_POST["submit"])){  

//  déclaration et définission des Variables 

$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["FilePD"]["name"]);
$UploadOk= 1;

$File_type=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$File_size=$_FILES["FilePD"]["size"]; 

// condition de l'extension de fichier "PDF"

if($File_type!="pdf"){
    echo "Type incompatible !";
    $UploadOk=0;
}
//condition de la taille de fichier "10 mb"

if($File_size>10*1024*1024){
    echo "Taille  sup à 10 mb";
    $UploadOk=0;


}

//Condition finale pour stocker le Fichier

if ($UploadOk==0){
    echo"<br>";
    echo "Fichier Non Enregistrer !";


}else {
    if (move_uploaded_file($_FILES["FilePD"]["tmp_name"], $target_file)) {
        echo "Fichier est uploader!";
}else{
    echo "Erreur est Produit";
}

}
}
// Creation d'un cookie

$cookie_name="Fichier";
$cookie_value="PDF";
setcookie($cookie_name,$cookie_value,time()+(86400*10),"/");

// Creation et déstruction d'une session

session_start();
$_SESSION["Fichier"] = "PDF";
session_destroy();


?>

</html>