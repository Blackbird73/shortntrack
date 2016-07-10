<?php 
 
    require_once('inc/config.inc.php');

    echo "<h3>CREATION DE LIEN COURT / REDIRECTION </h3><hr>";

    if(!empty($_GET['lien']) ){
 
        $lien_long  = urlencode($_GET['lien']); // lien reçu par formulaire
        $option     = $_GET['hits'];  // option (facultatif) suppression : 1 = supprimer après redir 0 = infini
        $id         = substr(str_shuffle($chaine), 0, $longueur); // créer un ID aléatoire
        $fic        = $chemin.$id;

        if( file_exists($fic.$ext) ){ // Vérifier si le fichier (ID) existe déjà
            while($id) { // On commence une boucle, jusqu'à ce que la condition soit validée
 
                $id = substr(str_shuffle($chaine), 0, $longueur); // créer un ID aléatoire
 
                if(file_exists($fic.$ext)){ // si l'ID est prise... 
                    continue; // on poursuit la boucle
                } else {
                    break; // Dès qu'une ID est valide, on sort de la boucle
                }
 
            } // end loop
        }

        // !important : tester le lien long avant de l'intégrer dans le fichier

        $headers = @get_headers($lien_long);
        if(strpos($headers[0],'404') === false)
        { 
            echo "Test lien Ok<br>";
        
        } else {
          
          echo "Le lien ne fonctionne pas : $lien_long<br>
          Veuillez réessayer avec un lien valide.";
          exit;
        }

 
        $fichier = file_put_contents($fic.$ext, $lien_long."\r\n".$option); // Création du fichier de redirection (lien + hits)
        $fichier = file_put_contents($fic.$sta, "0");  // création du fichier statistiques (nombre de hits)

        if( $fichier ){
            $website = $dns.$url.$bdd; // Si le fichier existe (écriture serveur Ok)
            $lien_court = $website.$bdd."?id=".$id; // Le lien court
            echo 'Votre lien court : <a href="'.$lien_court.'" target="_blank">'.$lien_court.'</a>';
        }else{
            echo "Petit problème... Merci de réessayer plus tard."; // Quelque chose ne fonctionne pas (sans doute un problème de CHMOD)
        }

    } else {

        echo "Requête non valable"; // Aucune données valable n'est passée par l'URL
    
    }
 

 ?>
