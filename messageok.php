<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Message envoyé</title>
</head>
<body>

<?php

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

$date=date('Y-m-d');
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$message = $_POST['message'];

$reqSQL = "INSERT INTO messages (jjmmaa, nom, adresse, cp, ville, mail, telephone, message) VALUES ('$date', '$nom', '$adresse', $cp, '$ville', '$mail', $tel, '$message');";

$res=$connexion->exec($reqSQL); // on exécute

header("Location: accueil.php");

include("includes/baspage.html");


?>

</body>
</html>
