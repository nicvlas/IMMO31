<!-- ce script permet de laisser un message après une recherche -->

<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/> 
	<title>IMMO31 - Laissez nous un message</title>
	<script type="text/javascript">
		function messageenvoye()
		{
			alert("Votre message a été envoyé avec succès. Notre équipe vous recontactera dans un délai de 3 jours. Vous allez être redirigé vers la page d'accueil.");
			return true;
		}
	</script>
</head>
<body>

<?php

include("connexionBdd.php"); // lien vers la base de données

include("includes/hautpage.html");
?>

<div id='message'><a href='accueil.php'>Revenir à l'accueil</a></div>

<center><br><br>Laissez votre message :</center><br>

<!-- formulaire pour laisser un message -->

<form action="messageok.php" method="POST" onsubmit="messageenvoye()">
	<center>
			<table id="letablaissermessage">
			<tr>
				<td>Nom :</td>
				<td width="85%"><input type='text' name='nom'></td>
			<tr>
				<td>Adresse :</td>
				<td><input type='text' name='adresse'></td>
			</tr>
			<tr>
				<td>Code postal :</td>
				<td><input type='text' name='cp' :></td>
			</tr>
			<tr>
				<td>Ville :</td>
				<td><input type='text' name='ville' :></td>
			</tr>
			<tr>
				<td>Mail :</td>
				<td><input type='text' name='mail' :></td>
			</tr>
			<tr>
				<td>Téléphone :</td>
				<td><input type='text' name='tel' :></td>
			</tr>
			<tr>
				<td>Message :</td>
				<td>			
					<textarea name="textarea" rows="5" cols="50" placeholder="Laissez votre message"></textarea></td>
			</tr>
		</table>

<br>

				<td><input type='submit' value='Envoyer'></td>
				<td><input type='reset' value='Réinitialiser'></td>

	</center>

<br><br>

<?php
include("includes/baspage.html");
?>


</body>
</html>
