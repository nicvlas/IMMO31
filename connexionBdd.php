<?php
	// Définitions de constantes pour la connexion à MySQL
	$hote="localhost";
	$login="root";
	$mdp="";
	$nombd="bd_immo31";

	// Connection au serveur
	try{
		$connexion = new PDO("mysql:hote=$hote;dbname=$nombd",$login,$mdp);
	}

	catch ( Exception $e )
	{

		die ("\n Connexion à '$hote' impossible : ".$e->getMessage());
		  
	}
?>

