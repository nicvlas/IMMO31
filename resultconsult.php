<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Consultation</title>
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

include('includes/hautpage.html');
include('connexionBdd.php');
include("includes/actions.html");
?>

<br>
<?php
$reqSQL="SELECT * FROM bien WHERE codedossier IN('";

$codedossier=$_POST['codedossier'];

for ($i=0; $i < count($codedossier); $i++)
	{ 
		if($i==count($codedossier)-1)
		{
			$reqSQL=$reqSQL.$codedossier[$i]."')";
		}
		else
		{
			$reqSQL=$reqSQL.$codedossier[$i]."','";
		}
	}

$res = $connexion -> query($reqSQL);

$ligne = $res -> fetch();

echo"<center><table border=1 id='letabres'>
			<tr>
				<td>Code dossier</td>
				<td>Prix vente</td>
				<td>Adresse</td>
				<td>Code postal</td>
				<td>Ville</td>
				<td>Surface (m²)</td>
				<td>Descriptif</td>
				<td>Aperçu</td>
			</tr>"; //on ne ferme pas le tableau car on le continue dans la boucle

while ($ligne!=false) //tant qu'on est pas arrivé à la fin du tableau
{

	$codedossier = $ligne['codedossier']; //on récupère la valeur de la colonne codedossier stockée dans $ligne qui contient le tableau
	$prixvente = $ligne['prixvente'];
	$adresse = $ligne['adresse'];
	$codepostal = $ligne['codepostal'];
	$ville = $ligne['ville'];
	$surface = $ligne['surface'];
	$descriptif = $ligne['descriptif'];
	$photo = "images/".$ligne['photo'].".jpg";

	//on affiche le tableau associé à la requête
	echo "<tr>
				<td>$codedossier</td>
				<td>$prixvente</td>
				<td>$adresse</td>
				<td>$codepostal</td>
				<td>$ville</td>
				<td>$surface</td>
				<td>$descriptif</td>
				<td><div class=zoom>
				<style>.zoom{
							}
				.image img {
				/* La transition s'applique à la fois sur la largeur et la hauteur, avec une durée d'une seconde. */
				-webkit-transition: all 1s ease;
				-moz-transition: all 1s ease;
				-ms-transition: all 1s ease;
				-o-transition: all 1s ease;
				transition: all 1s ease;
				}

				.image:hover img {
				/* L'image est doublée */
				-webkit-transform:scale(2);
				-moz-transform:scale(2;
				-ms-transform:scale(2;
				-o-transform:scale(2;
				transform:scale(2;
				}
				</style>

				<div class=image>
				<img src='$photo' height='50%' width='50%' alt=Text de remplacement/></div>
				</div>
				</td>
		</tr>";

	$ligne=$res->fetch(); //il faut re-fetcher pour avancer dans le tableau
}

echo "</table></center><br><br>";  //on ferme le tableau à la fin de la boucle

include('includes/baspage.html');

?>

</body>
</html>