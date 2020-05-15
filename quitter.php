<!-- script pour se déconnecter et détruire les variables de session + la session -->

<?php

session_start();

session_unset();

session_destroy();

header("Location: accueil.php");

?>