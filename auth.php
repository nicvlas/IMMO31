<!DOCTYPE html>
<html>
<head>
	<title></title>
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

include("includes/hautpage.html");

include("connexionBdd.php");

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

//on va chercher le mdp selon le pseudo saisi
$reqSQL="SELECT mdp FROM login WHERE pseudo='$pseudo'";

//on exécute la requête
$res=$connexion->query($reqSQL);

//on stocke la valeur dans un tableau
$ligne=$res->fetch();

//on la stocke dans '$mdputi'
$mdputi=$ligne['mdp'];

if($mdp == $mdputi)
{
	session_start(); //on démarre une session
	$_SESSION['connecte']='on'; //on fait une variable de session, comme un booléen
	header("Location: gestion.php");//on redirige vers la page de gestion des annonces
}
else
{
	session_start();
	$_SESSION['erreur']='on'; //si le mdp est pas bon, on fait une variable
	echo "Mdp faux";
	header("Location: accueil.php");//on redirige à l'accueil
}

include("includes/baspage.html");

?>
</body>
</html>