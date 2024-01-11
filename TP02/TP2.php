<?php

// classe Personne avec ses Attribut
class Personne{

public $nom;
public $prenom;
public $dateN;

//fontion se présenter
function Presenter(){

	return "je m'apelle ".$this->nom." ".$this->prenom;

}
//Fonction qui détermine l'age
function Age(){

	return date('Y')-($this->dateN);
}
//Fonction de description totale
function Decrire(){

	return "Nom : ".$this->nom."<br>"."Prenom : ".$this->prenom." <br>Age ".$this->Age()."<br>";
}

}

//Classe des ersonne d'ou on connait leurs Lieu de naissance
class lPersonne extends Personne{

	public $Lieu;

function Decrire(){

	return "Nom : ".$this->nom."<br>"."Prenom : ".$this->prenom." <br>Age ".$this->Age()."<br> Lieu Naissance ".$this->Lieu."<br>";
}
}

//Class Etudiant avec attribut ID

class Etudiant extends Personne{

	public $id;

// Constructeur d'arguments

function __construct($nom,$prenom,$dateN,$id){

	$this->nom=$nom;
	$this->prenom=$prenom;
	$this->dateN=$dateN;
	$this->id=$id;
}
//Getters & Setters

function get_info(){

	return "Nom : ".$this->nom."<br>"."Prenom : ".$this->prenom." <br>Age ".$this->Age()."<br> ID ".$this->id."<br>";

}


function set_info($nom,$prenom,$dateN,$id){
	$this->nom=$nom;
	$this->prenom=$prenom;
	$this->dateN=$dateN;
	$this->id=$id;

}
//fonction Bousier

function Boursier(){


if ($this->Age()>18 && $this->Age()<23 ){

	return "Vous étes Boursier";
}else{

	return "Vous n'étes pas boursier";
}
}

//Fonction d'affichage des infos

function Affichage(){

	return "Nom : ".$this->nom."<br>"."Prenom : ".$this->prenom." <br>Age ".$this->Age()."<br> ID ".$this->id."<br>";
}
}

//Création de 4 Objet de  Différents classes
$p1=new Personne;
$p2=new Personne;
$p3=new lPersonne;
$p4=new Etudiant("Mohamed","Moutaoikil",2001,222);

//instanciation des objets
$p1->nom="Mohamed";
$p1->prenom="Moutaoikil";
$p1->dateN=1992;

$p2->nom="Youness";
$p2->prenom="Moutaoikil";

$p3->nom="Mohamed";
$p3->prenom="Moutaoikil";
$p3->dateN=1992;
$p3->Lieu="Agadir";


//Utilisations des fonctions

echo $p1->Presenter()."<br>";
echo $p2->Presenter()."<br>";
echo $p1->Decrire()."<br>";
echo $p3->Decrire()."<br>";

echo $p4->Boursier()."<br>";
echo $p4->Affichage();









?>