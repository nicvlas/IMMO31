<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Modifier une annonce</title>
	<script type="text/javascript">
		function amodifie()
		{
			alert("Votre annonce a été modifiée avec succès.");
			return true;
		}
	</script>
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
include("includes/actions.html");
?>
<br>

<?php

$codedossier = $_POST['codedossier'];

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
				<td>Prix vente</td>
				<td>Adresse</td>
				<td>Code postal</td>
				<td>Ville</td>
				<td>Surface (m²)</td>
				<td>Descriptif</td>
				<td>Aperçu</td>
				<td>Type</td>
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
	$codetype=$ligne['codetype'];

	//on affiche le tableau associé à la requête
	echo "<tr>
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
				<td>$codetype</td>
		</tr>";

	$ligne=$res->fetch(); //il faut re-fetcher pour avancer dans le tableau
}

echo "</table></center><br><br>

<center>Les informations non remplies resteront inchangées
<form action='modifeffectuee.php' method='POST' onSubmit='return amodifie()'>
	<br><table>
		<tr>
			<td>Prix : </td>
			<td><input type='text' id='prixvente' name='prixvente' placeholder=$prixvente></td>
		</tr>
		<tr>
			<td>Adresse : </td>
			<td><input type='text' id='adresse' name='adresse' placeholder='$adresse'></td>
		</tr>
		<tr>
			<td>Code postal : </td>
			<td><input type='text' name='codepostal' id='cp' placeholder='$codepostal'></td>
		</tr>
		<tr>
			<td>Ville : </td>
			<td><input type='text' name='ville' id='ville' placeholder='$ville'></td>
		</tr>
		<tr>
			<td>Surface : </td>
			<td><input type='text' name='surface' surface='id' placeholder='$surface'></td>
		</tr>
		<tr>
			<td>Descriptif : </td>
			<td><input type='text' name='descriptif' id='des' placeholder='$descriptif'></td>
		</tr>
		<tr>
			<td>Type : </td>
			<td>
				<input type='radio' name='type' value='1' checked> Appartement (1) &nbsp <input type='radio' name='type' value='2'> Maison (2) &nbsp <input type='radio' name='type' value='3'> Local (3) &nbsp <input type='radio' name='type' value='4'> Parking (4) &nbsp
			</td>
	</table>
	<br>
	<tr>
		<td><input name='lecodedossier' type='hidden' value='$codedossier'></td>
	</tr>
		<tr>
			<td><input type='submit' value='Modifier'></td>
			<td><input type='reset' value='Réinitialiser'></td>
		</tr>
</center>
</form>";
?>

<script type="text/javascript" language="javascript">
	function vide();
</script>

<?php
include("includes/baspage.html");
?>

<!-- on utilise une ligne invisible dans le formulaire à la ligne 164 pour pouvoir transmettre à la page suivante le code du dossier -->

</body>
</html>