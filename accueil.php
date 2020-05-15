<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<meta charset="utf-8">
	<title>IMMO31 - Accueil</title>
	<link type="text/css" rel="stylesheet" href="css/main.css?t=<? echo time(); ?>" media="all">
	<script type="text/javascript" language="javascript">
		function pastoutrempli(){ //sert à vérifier qu'on a saisi tous les champs

			var budget=document.getElementById('budget').value;
			var cp=document.getElementById('cp[]').value;

			if (budget !="" && cp !="")
			{
				return true;
			}
			if (budget == "" || cp == "")
			{
				alert('Veuillez saisir tous les champs.');
				return false;
			}
			if (budget != "" && cp != "")
			{
				alert('Veuillez saisir tous les champs.');
				return false;
			}
		}
	</script>
	
</head>
<body>

<?php

include("includes/hautpage.html");


//s'il est connecté, on affiche le bouton de déconnexion et on propose d'aller à la page de gestion
session_start();
if(isset($_SESSION["connecte"]))
{
	if ($_SESSION["connecte"]=="on") {
		include("includes/btnlogout.html");
		echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
	}
}
else //sinon on propose de se connecter
{
	echo "<div id='seconnecter'>
	<a href='login.php'>Vous avez un compte ? Connectez-vous</a>
</div>";}

include("connexionBdd.php");

$reqSQL="SELECT DISTINCT codepostal FROM bien ORDER BY codepostal"; //requête pour récupèrer les CP de la BDD

$res=$connexion->query($reqSQL) or die ("Erreur dans la requête SQL : '$reqSQL'"); //on exécute la requête
?>


<br>

<form method="POST" action="resultatrecherche.php" name="formrecherche" id="formrecherche" onSubmit="return pastoutrempli()"> <!-- permet d'exécuter le script au clic sur rechercher -->
<center><table> <!-- premier tableau pour le type -->
	<tr>
		<td><b>Vous recherchez : </td></b>
		<td><input type="radio" name="type" value="appartement" checked="">Un appartement</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="radio" name="type" value="maison">Une maison</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="radio" name="type" value="local professionnel">Un local professionnel</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="radio" name="type" value="parking">Un parking</td>
	</tr>
</table></center>

<br>

<center>
	<table> <!-- deuxième tableau pour le budget -->
		<tr>
			<td><b>Votre budget : </b></td>
			<td><input type="text" name="budget" id="budget" size="10"> €</td>
		</tr>
	</table>
</center>

<br>

<center>
	<table> <!-- troisième tableau pour les codes postaux -->
		<tr>
			<td><b>Code postal (appuyez sur CTRL<br>pour en sélectionner plusieurs) :</b></td>
			<td>
			<?php
			
				echo "<select multiple name='cp[]' id='cp[]'>"; // on fait un tableau des codes postaux ([])

				while ($ligne=$res->fetch())// tant qu'on est pas à la fin du tableau crée
				{
					//$ligne['codepostal'] car on affiche la valeur de la colonne codepostal
					echo "<option>".$ligne["codepostal"]."</option>";
				}
				echo "</select>";
			?>
			</td>
		</tr>
	</table>
</center>

<input type="hidden" name="avalide"> <!-- on fait une variable cachée pour vérifier s'il a validé le formulaire pour savoir s'il peut passer à la page suivante -->


<br>

<center><input type="submit" value="Rechercher">	<input type="reset" value="Réinitialiser"></center> <!-- deux boutons -->


<br>
</form>

<?php
include("includes/baspage.html");
?>

</body>
</html>