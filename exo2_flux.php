<?php include 'config.php';
    echo" <strong>EXERCICE 2.1</strong> <br><br><br>";
    function mention($note){
        if ($note < SEUIL) {
            return "Ajourné";
        } elseif ($note >= SEUIL && $note < 12) {
            return "Passable";
        } elseif ($note >= 12 && $note < 14) {
            return "Assez bien";
        } elseif ($note >= 14 && $note < 16) {
            return "Bien";
        } elseif ($note >= 16 && $note <= NOTE_MAX) {
            return "Très bien";
        }
    }
   
    echo   mention(15) . "<br><br><br>";
    echo" <strong>EXERCICE 2.2</strong> <br><br><br>"; 
    $mois = date("m");
    switch ($mois) {
        case 1:
            echo "Janvier";
            break;
        case 2:
            echo "Février";
            break;
        case 3:
            echo "Mars";
            break;
        case 4:
            echo "Avril";
            break;
        case 5:
            echo "Mai";
            break;
        case 6:
            echo "Juin";
            break;
        case 7:
            echo "Juillet";
            break;
        case 8:
            echo "Août";
            break;
        case 9:
            echo "Septembre";
            break;
        case 10:
            echo "Octobre";
            break;
        case 11:
            echo "Novembre";
            break;
        case 12:
            echo "Décembre";
            break;
        default:
            echo "Mois invalide";
    }
    echo "<br> <br><br>";
    echo " <strong>EXERCICE 2.3</strong> <br>";
    //* si on oblier un brek : par exemple si on oublie le break du case 1, le code va continuer à exécuter les instructions des cases suivants jusqu'à rencontrer un break ou la fin du switch.
    for ($i = 1; $i <= 6; $i++) {
    
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
         ;
        }
    
    echo "<br>";
    }
$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }
    
    $i += 2; 

}
for ($i=0;$i<=10;$i++){
    if($i%2==0){
        echo "$i <br>";
    }
    else{
        continue;
    }
}
$i = 1;

while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break; 
            
        case 10:
            echo "At 10; quitting<br>";
            break 2; 
            
        default:
            echo "$i<br>";
            break;
    }
    
    $i++;
}
echo " <strong> utilisant do while avec qustion 2 </strong> <br>";
$i = 0; 

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }
    $i += 2;
} while ($i <= 20);
    
    


?>
