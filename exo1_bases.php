<?php echo 'Hello PHP <br>'; 
  //Ceci est un commentaire sur une ligne avec // 
   # Ceci est un commentaire sur une ligne avec #
   /* Ceci est un 
   commentaire sur 
   plusieurs lignes */
   $x=8; // Ce variable '$x' est valide car il commence par une lettre
   $_x=10; // Ce variable $_x est VALIDE (contrairement à ce qui est écrit, un nom de variable peut commencer par _)
   //$2x="hy"; erreur car le nom de la variable ne peut pas commencer par un chiffre
   //$x-y=5; erreur car le nom de la variable ne peut pas contenir de tiret
   $Prix_HT= 100; // Ce variable $Prix_HT est valide car il se compose de lettres et d'un underscore
   //$prix ht= 100; erreur car le nom de la variable ne peut pas contenir d'espace
   $état= "neuf";// Ce variable $état est valide car php accepte les accent
   $a=90;
   $A="Bonjour";
   echo "la valeure de a: $a <br>"; //affiche la valeure de a
   echo "la valeure de A: $A <br>"; //affiche la valeure de A
   require "config.php";
   echo "Établissement: " . ETABLISSEMENT . "<br>";
   echo "Note minimale: " . NOTE_MIN . "<br>";
   echo "Note maximale: " . NOTE_MAX . "<br>";
   echo "Seuil: " . SEUIL . "<br>";
    ?>