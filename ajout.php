<?php
//sert à ajouter la saisie d'un nouveau bien dans la bdd

session_start();
if(isset($_SESSION["connecte"]))
{
	if ($_SESSION["connecte"]!="on") {
		header("Location: login.php");
	}
}
else
{
	header("Location: login.php");
}

include("connexionBdd.php"); // lien vers la base de données
include("includes/hautpage.html"); //header

//on récupère les données saisies dans le formulaire et on l'insert into la table

$prixvente = $_POST['prixvente'];
$adresse = $_POST['adresse'];
$cp = $_POST['codepostal'];
$ville = $_POST['ville'];
$surface = $_POST['surface'];
$descriptif = $_POST['descriptif'];
$photo = $_POST['photo'];
$type= $_POST['type'];

$reqSQL = "INSERT INTO bien (prixvente, adresse, codepostal, ville, surface, descriptif, photo, codetype) VALUES ($prixvente, '$adresse', $cp, '$ville', $surface, '$descriptif', '$photo', $type)";

$res=$connexion->exec($reqSQL) or die ('Veillez à bien saisir tous les champs.'); // on exécute

header("Location: gestion.php");

include("includes/baspage.html");


?>
