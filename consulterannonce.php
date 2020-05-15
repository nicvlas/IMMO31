<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Consulter une annonce</title>
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

include("connexionBdd.php");
include("includes/hautpage.html");
include("includes/btnlogout.html");
echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
echo "<br>";

include("includes/actions.html");


?>


<form action="resultconsult.php" method="post">

<?php
$reqSQL = "SELECT codedossier FROM bien ";

$res = $connexion->query($reqSQL) or die ("Erreur dans la requête SQL '$reqSQL'");

echo "<center><h1><u>Quelle(s) annonce(s) voulez-vous consulter ?</u></h1></center>

			<center><select multiple name='codedossier[]'>";

					while ($ligne=$res->fetch())// tant qu'on est pas à la fin du tableau crée
					{
						echo "<option>".$ligne["codedossier"]."</option>";
					}
					echo "</select></center>";
?>

<br><br>

<center><input type="submit" value="Consulter"> &nbsp <input type="reset" value="Annuler"></center>

</form>


<?php
include("includes/baspage.html");
?>

</body>
</html>