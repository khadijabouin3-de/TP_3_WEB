<?php
$dateActuelle = new DateTime();
$dateFin = new DateTime("2027-06-30");

$difference = $dateActuelle->diff($dateFin);

echo "Il reste " . $difference->days . " jours avant la fin du semestre.";
$jour = 29;
$mois = 2;
$annee = 2026;

if (checkdate($mois, $jour, $annee)) {
    echo "<p>Date valide</p>";
} else {
    echo "<p>Date invalide</p>";
}
?>