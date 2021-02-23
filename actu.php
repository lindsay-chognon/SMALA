<?php
include('src/php/connectDB.php');
if(!isset($_SESSION['user_role'])){
    header('Location: index.php');
} else {
    echo('Bienvenue sur la page actu');
    echo('<a href="src/php/logout.php">Déconnexion</a>');
    echo("<p>Role de la session (1 admin / 0 utilisateur : ".$_SESSION['user_role']."</p>");
    echo("<p>Id de l'utilisateur : ".$_SESSION['user_id']."</p>");
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
    <main>
        <form action="src/php/upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="img_titre" id="img_titre" placeholder="Titre de l'image" required>
            <input type="submit" value="Partager" name="submit">
        </form>
        <?php
        try {
            $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "SELECT * FROM `img`;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute();
            $res = $prepare->rowCount();
            $resultat = $prepare->fetchAll();
            foreach($resulat as $key => $value){
                ?>
                <div class="div_img">
                    
                </div>
                <?php
            }
          } catch (PDOException $e) {
            exit("❌🙀❌ OOPS :\n" . $e->getMessage());
          }
        ?>
    </main>
    <script src="src/js/app.js"></script>
</body>
</html>