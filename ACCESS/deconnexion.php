<?php
// Démarrer la session (si ce n'est pas déjà fait)
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();


header("Location: ../CMD/log.php");
exit();
?>