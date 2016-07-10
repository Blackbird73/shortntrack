<?php

// Fichier config ShortNTrack

$dns		  = "http://".$_SERVER[HTTP_HOST]."/";		// Adresse du script 
$url		  = "snt/";	// Répertoire du script
$accueil 	= "http://".$_SERVER[HTTP_HOST."/?redir"; // Redirection par défaut (pas d'ID ou ID inexistante)
$chemin 	= "liens/";	// Répertoire
$ext 		  = ".lnk";	// Extension liens
$sta 		  = ".sta";	// Extension fichier statistiques
$chaine 	= "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz"; // caractères à utiliser pour créer l'ID
$longueur	= "6";		// Longueur d'un code ID ; 6 par défaut

?>
