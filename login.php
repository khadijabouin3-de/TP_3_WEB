
<?php
session_start(); // Première instruction PHP

// Si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = trim($_POST["login"]);

    if ($login != "") {
        $_SESSION["login"] = $login;
        $infos = [
            "login" => $login,
            "date" => date("Y-m-d H:i:s")
        ];

        $cookie = json_encode($infos);

        setcookie("connexion_info", $cookie, time() + 86400, "/");
        setcookie("dernier_login", $login, time() + 86400, "/");
        header("Location: profil.php");
        exit;
    } else {
        $erreur = "Veuillez saisir votre login.";
    }
}
?>
<?php
if (isset($_COOKIE["connexion_info"])) {
    $infos = json_decode($_COOKIE["connexion_info"], true);

    echo "Dernier login : " . htmlspecialchars($infos["login"]);
    echo "<br>";
    echo "Date de connexion : " . htmlspecialchars($infos["date"]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

    <h2>Connexion</h2>

    <?php
    if (isset($erreur)) {
        echo $erreur;
    }
    ?>

    <form method="POST" action="login.php">
        <label>Login :</label>
        <input type="text" name="login"
        value="<?php echo htmlspecialchars($_COOKIE['dernier_login'] ?? ''); ?>">
        <input type="submit" value="Se connecter">
    </form>

</body>
</html>
