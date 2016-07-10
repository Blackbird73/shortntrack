<?php

// Page index : redirection de liens ou redirection vers site web
 
    require_once('inc/config.inc.php'); // Variables
 
    if(isset($_GET['id'])){
        // Eviter les hacks
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);   

        if( file_exists($chemin.$id.$ext) ){ // le fichier existe-t-il ?
            // OUI : on poursuit la procédure
            //$lien = file_get_contents($chemin.$id.$ext); // on récupère le lien long

            $fichier = fopen($chemin.$id.$ext, "r");
            while(!feof($fichier)){
                $lien   = urldecode(fgets($fichier));
                $option = substr(fgets($fichier),-1);
            }
            fclose($fichier);

           // Vérifier le lien (http ou https)

            if (substr($lien,0,4) !="http") { $lien = "http://".$lien; }
            
           if ($option == 1) { // $option == 0 --> infini
            unlink($chemin.$id.$ext); // Supprimer le fichier si option = 1
            } else {
                if ($option !=0) {
                    $option = $option -1; // retrancher 1
                    $fichier = fopen($chemin.$id.$ext, "w");
                        fputs ($fichier, $lien);
                        fputs ($fichier, $option);
                    fclose($fichier);
                }
            } 

            // Stats : enregister une trace du passage dans un fichier
 
                $fic = $chemin.$id.$sta;
                $fp = fopen ($fic, "r+"); // w+ : ouvre et écrit, s'il n'existe pas, il le crée
                $hits = fread ($fp, 1024);
                $hits = $hits +1;
                fseek ($fp, 0);
                fwrite ($fp, $hits);
                fclose ($fp);

            header('location: '.$lien); // on redirige vers le lien long

        } else {
            // NON : Lien introuvable : on redirige vers la sortie...
            header('location: '.$accueil); 
        }
 
    } else {
        // Aucun ID : on redirige vers la sortie...
        header('location: '.$accueil);
    }
 
?>
