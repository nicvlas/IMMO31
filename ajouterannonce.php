<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Ajouter une annonce</title>
	<script type='text/javascript' language='javascript'>
		function ajoutee()
		{
			alert('Votre annonce a été ajoutée avec succès.');
			return true;
		}
	</script>
</head>
<body>

<?php

include("includes/hautpage.html");
include("includes/btnlogout.html");
include("connexionBdd.php");
echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
echo "<br>";
include("includes/actions.html");


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

//on récupère le dernier codedossier pour indiquer le nom à utiliser pour la photo
$sql="SELECT max(codedossier) from bien";
$res = $connexion -> query($sql);

$ligne = $res -> fetch();
$num = $ligne['max(codedossier)'];

?>

<br>

<form action="ajout.php" method="POST" onSubmit='return ajoutee()'>
	<center>
		<center><table border=1 id='letabajout'>
			<tr>
				<th>Type</th>
				<td><input type="radio" name="type" value="1">Appartement&nbsp<input type="radio" name="type" value="2">Maison &nbsp <input type="radio" name="type" value="3"> Local professionnel &nbsp <input type="radio" name="type" value="4">Parking &nbsp</td>
			</tr>
			<tr>
				<th>Prix de vente</th>
				<td><input type="text" name="prixvente"></td>
			</tr>
			<tr>
				<th>Adresse</th>
				<td><input type="text" name="adresse"></td>
			</tr>
			<tr>
				<th>Code postal</th>
				<td><input type="text" name="codepostal"></td>
			</tr>
			<tr>
				<th>Ville</th>
				<td><input type="text" name="ville"></td>
			</tr>
			<tr>
				<th>Surface (m²)</th>
				<td><input type="text" name="surface"></td>
			</tr>
			<tr>
				<th>Descriptif (max 250)</th>
				<td><textarea name="descriptif" rows="5" cols="50"></textarea></td>
			</tr>
			<tr>
				<th>Photo</th>
				<td><?php echo "<b><u>image".($num+1).".jpg</u></b>";?><h5>NE PAS MODIFIER : Ajoutez l'image dans le dossier "images" avec ce même nom.</h5></td>
			</tr>

<br>
</table>
<div id="btnajout">
			<tr>
				<td><input type="submit" value="Ajouter"></td> 
				<td><input type="reset" value="Réinitialiser"></td>
			</tr>
	</center>
</form></div>

<?php
include("includes/baspage.html");
?>
</body>
</html>