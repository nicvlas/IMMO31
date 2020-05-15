<!-- ce script permet de supprimer le dossier désiré -->

<?php

include("connexionBdd.php");

$codedossier = $_POST['codedossier'];

$reqSQL="DELETE FROM bien WHERE codedossier = $codedossier";

$res = $connexion -> exec($reqSQL);

session_start(); //booléen pour savoir s'il a supprimé quelque chose

$_SESSION['asupprime']='on';

header("Location: gestion.php");


?>