
<?php
require_once "config.php";


if (!file_exists("data/notes.csv")) {
    echo "Erreur : Le fichier n'existe pas.";
    exit;
}


$fichier = fopen("data/notes.csv", "r");

if ($fichier === false) {
    echo "Erreur : Impossible d'ouvrir le fichier.";
    exit;
}

echo "<h2>Liste des apprenants</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

$sommeGenerale = 0;
$nombreApprenants = 0;


while (!feof($fichier)) {

    $ligne = fgets($fichier);

    if ($ligne === false) {
        continue;
    }

    
    $donnees = explode(";", trim($ligne));

    if (count($donnees) != 3 ||
        !is_numeric($donnees[1]) ||
        !is_numeric($donnees[2])) {
        continue;
    }

    $nom = htmlspecialchars($donnees[0]);
    $note_info = (float) $donnees[1];
    $note_math = (float) $donnees[2];

    $moyenne = ($note_info + $note_math) / 2;

    $sommeGenerale += $moyenne;
    $nombreApprenants++;

    echo "<tr>";
    echo "<td>$nom</td>";
    echo "<td>$note_info</td>";
    echo "<td>$note_math</td>";
    echo "<td>" . number_format($moyenne, 2) . "</td>";
    echo "<td>" . mention($moyenne) . "</td>";
    echo "</tr>";
}

echo "</table>";

fclose($fichier);


if ($nombreApprenants > 0) {
    $moyenneGenerale = $sommeGenerale / $nombreApprenants;

    echo "<h3>Moyenne générale : "
         . number_format($moyenneGenerale, 2) . "</h3>";
} else {
    echo "Aucun apprenant enregistré.";
}


function mention($moyenne) {
    if ($moyenne >= 16) return "Très bien";
    elseif ($moyenne >= 14) return "Bien";
    elseif ($moyenne >= 12) return "Assez bien";
    elseif ($moyenne >= SEUIL) return "Passable";
    else return "Ajourné";
}
/*
Comparaison :

fgetcsv() :
Avantages : simple et adapté aux fichiers CSV,
gère les champs entre guillemets.
Inconvénient : moins de contrôle sur le découpage manuel.

fgets() + explode() :
Avantages : simple pour lire et découper des lignes
avec un séparateur fixe.
Inconvénient : ne gère pas correctement les champs
contenant le séparateur ou des guillemets.
*/
?>
