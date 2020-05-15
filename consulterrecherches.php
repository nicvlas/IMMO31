<?php

include("includes/hautpage.html");
include("includes/btnlogout.html");
echo "<div id='message'><a href='gestion.php'>Gestion</a></div>";
include("connexionBdd.php");
echo "<br>";
include("includes/actions.html");

//on va chercher le contenu de la table recherche
$reqSQL="SELECT * from recherches";
$res = $connexion -> query($reqSQL);
$lignerecherche = $res -> fetch();

echo "<br>";

if($lignerecherche == 0) //si il n'y a aucune recherche effectuée
{
	echo "<center>Il n'y a aucune recherche effectuée actuellement</center>";
}

if($lignerecherche!=false) //sinon, on fait un tableau avec toutes les recherches
{
	echo "<center><table id='letabres' border=1>
			<tr><th>ID</th>
				<center><th>Recherche</th></center>
			</tr>";
}

while ($lignerecherche != false) {// on continue tant qu'on est pas à la fin du fetch
				
	$id = $lignerecherche['id'];
	$recherche = $lignerecherche['recherche'];

	echo "<tr><td>$id</td>
				<td>$recherche</td>
		</tr>";

	$lignerecherche = $res -> fetch(); // on avance dans le tableau

}

echo "</table></center>";//on ferme le tableau à la fin	


include("includes/baspage.html");
?>