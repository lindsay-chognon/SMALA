<?php
include('src/php/connectDB.php');
if($_SESSION['user_role'] !=  1){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Title -->
    <meta name="description" content="Home description.">
    <title>MA SMALA</title>
    <meta charset="UTF-8"/>
    <!-- Robots -->
    <meta name="robots" content="index, follow">
    <!-- Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- Links -->
    <link rel="stylesheet" type="text/css" href="src/css/style.css"/>
</head>
<body>
    <nav>
        <h1>SMALA</h1>
        <div id="btn_menu">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <a href="actu.php"><li>Fil d'actualité</li></a>
                <a href="profil.php"><li>Mon Profil</li></a>
                <?php
                if($_SESSION['user_role'] == 1) {
                    ?>
                    <a href="admin.php"><li>Page admin</li></a>
                    <?php
                }
                ?>
                <a href="src/php/logout.php"><li>Déconnexion</li></a>
            </ul>
        </div>
    </nav>
    <main></main>
    <script src="src/js/app.js"></script>
</body>
</html>