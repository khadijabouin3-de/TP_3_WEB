

<?php
require_once "config.php";

if (isset($_POST["nom"]) &&
    isset($_POST["note_info"]) &&
    isset($_POST["note_math"])) {

    $nom = trim($_POST["nom"]);
    $note_info = trim($_POST["note_info"]);
    $note_math = trim($_POST["note_math"]);

    if ($nom == "" || $note_info == "" || $note_math == "") {
        echo "Erreur : Tous les champs sont obligatoires.";
    }

    elseif (!is_numeric($note_info) || !is_numeric($note_math)) {
        echo "Erreur : Les notes doivent être numériques.";
    }

    elseif ($note_info < NOTE_MIN || $note_info > NOTE_MAX ||
            $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
        echo "Erreur : Les notes doivent être entre "
             . NOTE_MIN . " et " . NOTE_MAX;
    }

    else {
        // Enregistrement dans le fichier CSV
        $fichier = fopen("data/notes.csv", "a");

        if ($fichier !== false) {
            fputcsv($fichier, [$nom, $note_info, $note_math], ";");
            fclose($fichier);

            $nomAffiche = htmlspecialchars($nom);

            echo "<h2>Récapitulatif</h2>";
            echo "Nom : " . $nomAffiche . "<br>";
            echo "Note Informatique : " . $note_info . "<br>";
            echo "Note Mathématiques : " . $note_math . "<br>";
            echo "Enregistrement réussi !";
        } else {
            echo "Erreur lors de l'ouverture du fichier.";
        }
    }

} else {
    echo "Erreur : Les champs n'ont pas été envoyés.";
}

/*
Le mode "a" ajoute les données à la fin du fichier
sans supprimer les anciennes données.

Le mode "w" supprime l'ancien contenu du fichier
avant d'écrire les nouvelles données.
*/
/*
Réponse aux questions :

1. On préfère POST à GET pour un mot de passe
   parce que les données ne s'affichent pas dans l'URL.

2. $_REQUEST contient les données envoyées par GET,
   POST et les cookies ($_COOKIE).
*/
?>
?>

