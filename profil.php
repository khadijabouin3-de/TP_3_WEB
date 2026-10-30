
<?php
session_start();

// Vérifier si le login existe
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>

    <h2>Bienvenue <?php echo htmlspecialchars($_SESSION["login"]); ?> !</h2>

    <a href="deconnexion.php">Se déconnecter</a>

</body>
</html>
