
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


$resultats = [];

while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {

    if (count($ligne) != 3 ||
        !is_numeric($ligne[1]) ||
        !is_numeric($ligne[2])) {
        continue;
    }

    $nom = $ligne[0];
    $note_info = (float) $ligne[1];
    $note_math = (float) $ligne[2];

    $moyenne = ($note_info + $note_math) / 2;

    $resultats[$nom] = [
        "note_info" => $note_info,
        "note_math" => $note_math,
        "moyenne" => $moyenne
    ];
}

fclose($fichier);


$json = json_encode($resultats, JSON_PRETTY_PRINT);

file_put_contents("data/notes.json", $json);

echo "<h2>Contenu du fichier JSON :</h2>";


$json = file_get_contents("data/notes.json");

$donnees = json_decode($json, true);


echo "<pre>";
print_r($donnees);
echo "</pre>";


echo "<h2>Comparaison :</h2>";

echo "<h3>Avec serialize() :</h3>";
echo "<pre>";
print_r(serialize($resultats));
echo "</pre>";

echo "<h3>Avec json_encode() :</h3>";
echo "<pre>";
echo json_encode($resultats, JSON_PRETTY_PRINT);
echo "</pre>";

/*
Réponse à la question :

JSON est directement exploitable par une application JavaScript,
car JavaScript possède JSON.parse() pour lire les données JSON.

serialize() est un format propre à PHP.
*/
?>
