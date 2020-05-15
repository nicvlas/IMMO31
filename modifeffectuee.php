<!-- ce script sert à récupérer les valeurs du formulaire de modification et de les insérer dans la base de données afin de procéder à la modification

On va quand même récupérer les anciennes valeurs si jamais le champ est vide-->

<?php
include("includes/hautpage.html");
include("connexionBdd.php");

$codedossier = $_POST['lecodedossier'];

$nvprix = $_POST['prixvente'];
$nvadresse = $_POST['adresse'];
$nvcp = $_POST['codepostal'];
$nvville = $_POST['ville'];
$nvsurface = $_POST['surface'];
$nvdescriptif = $_POST['descriptif'];
$nvtype=$_POST['type'];

//on récupère les vieilles valeurs
$reqSQL="SELECT * from bien where codedossier=$codedossier";

$res = $connexion -> query($reqSQL);

$ligne=$res->fetch();

$prix = $ligne['prixvente'];
$adresse = $ligne['adresse'];
$cp = $ligne['codepostal'];
$ville = $ligne['ville'];
$surface = $ligne['surface'];
$descriptif = $ligne['descriptif'];
$type=$ligne['codetype'];

//on fait la requête pour update le dossier. Si le champ rempli précédemment est vide, on garde ce qu'il y avait avant. Sinon, on remplace.

$reqSQL="UPDATE bien SET";

if($nvprix == '')
{
	$reqSQL = $reqSQL." prixvente = '$prix', ";
}
else
{
	$reqSQL = $reqSQL." prixvente = '$nvprix', ";
}

if($nvadresse == '')
{
	$reqSQL = $reqSQL."adresse = '$adresse', ";
}
else
{
	$reqSQL = $reqSQL."adresse = '$nvadresse', ";
}

if($nvcp == '')
{
	$reqSQL = $reqSQL."codepostal = '$cp', ";
}
else
{
	$reqSQL = $reqSQL."codepostal = '$nvcp', ";
}

if($nvville == '')
{
	$reqSQL = $reqSQL."ville = '$ville', ";
}
else
{
	$reqSQL = $reqSQL."ville = '$nvville', ";
}

if($nvsurface == '')
{
	$reqSQL = $reqSQL."surface = '$surface', ";
}
else
{
	$reqSQL = $reqSQL."surface = '$nvsurface', ";
}

if($nvdescriptif == '')
{
	$reqSQL = $reqSQL."descriptif = '$descriptif', ";
}
else
{
	$reqSQL = $reqSQL."descriptif = '$nvdescriptif', ";
}

if(!isset($nvtype))
{
	$reqSQL = $reqSQL."codetype = '$type'";
}
else
{
	$reqSQL = $reqSQL."codetype = '$nvtype'";
}

$reqSQL = $reqSQL." WHERE codedossier=$codedossier";

$res = $connexion -> exec($reqSQL);

header("Location: gestion.php");

include("includes/baspage.html");
?>