<!DOCTYPE html>
<html>
<head>
	<title>IMMO31 - Consultation des messages</title>
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

include ("connexionBdd.php");
include("includes/hautpage.html");
include("includes/btnlogout.html");
echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
echo "<br>";
include("includes/actions.html");
echo "<br>";

//on récupère les messages dans la table
$sql = "SELECT * from messages";

$res = $connexion -> query($sql);

$ligne = $res -> fetch();

if ($ligne == false) {
	echo "<center>Il n'y a aucun message.</center>";
}
else
{
	$id = $ligne['id']; //on récupère les données de la base
	$date = $ligne['jjmmaa'];
	$nom = $ligne['nom'];
	$adresse = $ligne['adresse'];
	$cp = $ligne['cp'];
	$ville = $ligne['ville'];
	$mail = $ligne['mail'];
	$tel = $ligne['telephone'];
	$message = $ligne['message'];

	echo "<center><table id='letabres' border='1'>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Nom</th>
				<th>Adresse</th>
				<th>Code postal</th>
				<th>Ville</th>
				<th>Mail</th>
				<th>Téléphone</th>
				<th>Message</th>
			</tr>";

	while ($ligne != false) {
		echo "<tr>
				<td>$id</td>
				<td>$date</td>
				<td>$nom</td>
				<td>$adresse</td>
				<td>$cp</td>
				<td>$ville</td>
				<td>$mail</td>
				<td>$tel</td>
				<td>$message</td>
			</tr>";

			$ligne = $res -> fetch();
	} echo "</table></center>";
}

include("includes/baspage.html");


?>

</body>
</html>