
<?php
require_once "config.php";


if (!file_exists("data/notes.csv")) {
    echo "Erreur : Le fichier notes.csv n'existe pas.";
    exit;
}


$fichier = fopen("data/notes.csv", "r");

if ($fichier === false) {
    echo "Erreur : Impossible d'ouvrir le fichier.";
    exit;
}


function mention($moyenne) {
    if ($moyenne >= 16) {
        return "Très bien";
    } elseif ($moyenne >= 14) {
        return "Bien";
    } elseif ($moyenne >= 12) {
        return "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
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


while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {

    if (count($ligne) != 3 ||
        !is_numeric($ligne[1]) ||
        !is_numeric($ligne[2])) {
        continue;
    }

    $nom = htmlspecialchars($ligne[0]);
    $note_info = (float) $ligne[1];
    $note_math = (float) $ligne[2];

    
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
    echo "<h3>Moyenne générale de la classe : "
         . number_format($moyenneGenerale, 2) . "</h3>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}
?>
