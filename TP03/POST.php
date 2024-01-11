<?php
require('src/model.php');

connect();
CreateDB();
CreateTable();


$posts = getPosts();

require('templates/homepage.php');


if (isset($_GET['action'])) {
$Comment =getComment();
require('templates/Commentaire.php');
}

?>