<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" rel="shortcut icon" >
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/> 
	<title>IMMO31 - Résultat de la recherche</title>
</head>
<body>

<?php


include("connexionBdd.php"); // lien vers la base de données
include("includes/hautpage.html");

$avalide = $_POST['avalide'];

if (!isset($avalide)) { //on vérifie si il essaie d'accéder à la page de résultat sans avoir fait de recherche
header("Location: accueil.php");
}
else
{}

session_start();
if(isset($_SESSION["connecte"]))
{
	if ($_SESSION["connecte"]=="on") {
		include("includes/btnlogout.html");
		echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
	}
}
else
{
	echo "<div id='message'><a href='laissermessage.php'>Laissez-nous un message</a> / <a href='accueil.php'>Retour au menu</a></div>";}



$type=$_POST['type']; // on récupère les valeurs
$budget=$_POST['budget'];
$codepostal=array_values($_POST['cp']); //array_values sert à  retourner les valeurs d'un tableau


$reqSQL = "SELECT * FROM bien b, typelogement t WHERE b.codetype=t.codetype AND libelletype = '$type' AND prixvente <= '$budget' AND codepostal IN('"; //notre requête

for ($i=0; $i < count($codepostal); $i++)
	{ 
		if($i==count($codepostal)-1)
		{
			$reqSQL=$reqSQL.$codepostal[$i]."')";
		}
		else
		{
			$reqSQL=$reqSQL.$codepostal[$i]."','";
		}
	}

$res=$connexion->query($reqSQL);

 //phrase récapitulant la recherche, on fait un switch pour gérer si le type est féminin ou masculin
switch ($type) {
	case 'appartement':
		$message="<br><center>Vous recherchez un ".$type." de ".$budget."€ maximum dans le";
		$recherche="$type de $budget € maximum dans le";
		break;
	
	case 'maison':
		$message="<br><center>Vous recherchez une ".$type." de ".$budget."€ maximum dans le ";
		$recherche="$type de $budget € maximum dans le";
		break;

	case 'local professionnel':
		$message="<br><center>Vous recherchez un ".$type." de ".$budget."€ maximum dans le ";
		$recherche="$type de $budget € maximum dans le";
		break;

	case 'parking':
		$message="<br><center>Vous recherchez un ".$type." de ".$budget."€ maximum dans le ";
		$recherche="$type de $budget € maximum dans le";
		break;
}

for ($i=0; $i < count($codepostal) ; $i++) //boucle pour récupérer les codes postaux et les afficher 
{ 
	$message=$message." $codepostal[$i],"; // les résultats stockés étant dans $codepostal, on fait une boucle for pour récupérer et ajouter à $message le CP
	$recherche=$recherche." $codepostal[$i],";
}

echo "<BR><BR>$message voici votre sélection :<br><br><br></center>"; // on affiche le message final

$res=$connexion->query($reqSQL); //on exécute la requête

$ligne=$res->fetch(); //on stocke les résultats dans un tableau (fetch)

if ($ligne!=false) //tant qu'on est pas arrivé à la fin du tableau, autrement dit que la requête renvoie au moins quelque chose
{

echo "<center><table border=1 id='letabres'>
			<tr>
				<td>Code dossier</td>
				<td>Prix de vente</td>
				<td>Adresse</td>
				<td>Code postal</td>
				<td>Ville</td>
				<td>Surface (m²)</td>
				<td>Descriptif</td>
				<td>Aperçu</td>
			</tr>"; //on ne ferme pas le tableau car on le continue dans la boucle
}

while ($ligne!=false) //tant qu'on est pas arrivé à la fin du tableau
{

	$existe;
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
		</tr>";

	$ligne=$res->fetch(); //il faut re-fetcher pour avancer dans le tableau
}

echo "</table></center>";  //on ferme le tableau à la fin de la boucle


//si jamais il n'y a aucun résultat à la requête
if ($res=$connexion->query($reqSQL)->fetch() == 0) {
	echo "<center>Aucune annonce ne correspond à vos critères.</center>";
}

$res=$connexion->exec("INSERT INTO recherches (recherche) VALUES('$recherche')");

include("includes/baspage.html");

?>


</body>
</html>


