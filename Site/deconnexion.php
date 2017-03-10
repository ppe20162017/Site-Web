    <?php
session_destroy ();

// On redirige le visiteur vers la page de connexion
header ('location: connexion.php');
?>