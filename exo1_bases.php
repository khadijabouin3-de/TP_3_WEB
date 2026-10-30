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
   if (defined('SEUIL')) {
    echo "SEUIL existe.<br>";
  }
  else {
    echo "SEUIL n'existe pas.<br>";
  } 

  if (defined('INCONNUE')) {
    echo "INCONNUE existe.<br>";
  }
  else {
    echo "INCONNUE n'existe pas.<br>";
  }
  /*
  1. Si on affiche une constante non définie, PHP génère une erreur
   

  2. const permet de déclarer une constante directement.
   define() permet de déclarer une constante à l'aide d'une fonction.
  */
  $prix_ht = 60;
  $tva = 20;
  $TTC = $prix_ht + ($prix_ht * $tva / 100);
  echo "le prix TTC est: $TTC <br>";
  $test = 42;
  $test = (string) $test;
  var_dump($test);
  echo "<br>";
  
  var_dump((bool) 0) ;
  echo "<br>";
  var_dump((bool) 0.0) ;
  echo "<br>";
  var_dump((bool) "0") ;
  echo "<br>";
  var_dump((bool) "") ;
  echo "<br>";
  var_dump((bool) "abc") ;
  echo "<br>";
  var_dump((bool) []) ;
  echo "<br>";
  var_dump((bool) null) ;
  echo "<br>";
  var_dump((int) 3.9);
  echo "<br>";
  var_dump((int) "12abc");
  echo "<br>";
  var_dump((float) "1.5e3");
  echo "<br>";
  var_dump((int) true);
  echo "<br>";
 
  $decimal = 255;
  $hexadecimal = "FF";
  $octal = "377";
  $binaire = "11111111";

  echo "Décimal : " . $decimal . "<br>";
  echo "Hexadécimal : " . $hexadecimal . "<br>";
  echo "Octal : " . $octal . "<br>";
  echo "Binaire : " . $binaire . "<br>";
 

$traitees = "égales à";
$ici = 2;


echo '1. Ahmed a dit : "J\'ai réussi"<br>';


echo '2. Voulez-vous supprimer C:\*.*?<br>';


echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';



echo '4. Les variables ne seront pas $traitees $ici<br>';

echo "5. Les variables seront $traitees $ici<br>";

echo "<br><hr><br>";



$chaine = "*Bonjour les développeurs*";


$chaine_nettoyee = trim($chaine, "*");


$longueur = strlen($chaine_nettoyee);

for ($i = 0; $i < $longueur; $i++) {
    echo $chaine_nettoyee[$i] . "<br>";
}
?>


