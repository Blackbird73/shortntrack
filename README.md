# shortntrack
URL shortener and tracking code

Réduction d'URL longs et redirection par tracking code
Pas de base de données ; les URL longs, l'option du nombre de hits et les statistiques (nombre de redirections) sont stockés dans un simple fichier texte
Option : possibilité de limiter les redirections 

--- 
Installation :
1. Editer le fichier inc/config.inc.php
2. copier les 3 fichiers à la racine du site
3. Créer un répertoire BDD/ pour stocker les fichiers (liens)

---
Création d'un lien court :
Appeler l'URL exemple : creer.php?lien=http://www.github.com/Blackbird73/shortntrack&hits=1

---
Todo : Création d'un URL court par formulaire
