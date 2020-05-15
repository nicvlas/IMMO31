<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Connexion</title>
</head>
<body>

<?php
include("includes/hautpage.html");
?>

<div id='message'><a href='accueil.php'>Revenir au menu</a></div>

<!-- formulaire de connexion -->
<form action="auth.php" method="POST" id="letablog">
	<center>
		<table>
			<tr>
				<td>Pseudo : </td><td><input type="text" name="pseudo" size="15"></td>
			</tr>
			<tr>
				<td>Mot de passe : </td><td><input type="password" name="mdp" size="16"></td>
			</tr>
		</table>
<br>
			<tr>
				<td><input type="submit" value="Se connecter"></td> 
				<td><input type="reset" name="Réinitialiser"></td>
			</tr>
	</center>
</form>

<?php
include("includes/baspage.html");
?>

</body>
</html>
