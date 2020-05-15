<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<title>IMMO31 - Supprimer une annonce</title>
	<script type="text/javascript">
		function confirmersuppression()
		{
			if (confirm("Êtes-vous sûr(e) de vouloir supprimer cette annonce ?")){
				return true;			}
			else
			{
				return false;
			}
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
include("includes/btnlogout.html");
echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
include("connexionBdd.php");
echo "<br>";

include("includes/actions.html");

?>


<form action="suppreffectuee.php" method="post" onsubmit="return confirmersuppression()">
<?php

$reqSQL = "SELECT codedossier FROM bien ";

$res = $connexion->query($reqSQL) or die ("Erreur dans la requête SQL '$reqSQL'");

echo "<center><h1><u>Quelle annonce voulez-vous supprimer ?</u></h1></center>
			<center><select name='codedossier'>";

					while ($ligne=$res->fetch())// tant qu'on est pas à la fin du tableau crée
					{
						echo "<option>".$ligne["codedossier"]."</option>";
					}
					echo "</select></center>";

?>

<br><br>
<center><input type="submit" value="Supprimer"> &nbsp <input type="reset" value="Réinitialiser"></center>
</form>

<?php

include("includes/baspage.html");
?>
</body>
</html>

