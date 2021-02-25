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
    <main>
        
        <form method='POST'>
            <label for="pseudo">Pseudo</label>
            <input type="text" name='pseudo'>
            <label for="mail">Adresse e-mail</label>
            <input type="text" name='mail'>
            <label for="mdp">Mot de passe</label>
            <input type="text" name='mdp'>
            <input type="text" name='role' value='0' hidden>
            <input type="submit" name='submit' value='CREER'>
        </form>
        
    <?php
        
        include "connectDB.php";

try{

    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    $user_pseudo = htmlspecialchars($_POST['pseudo']);
    $user_mail = htmlspecialchars($_POST['mail']);
    $user_mdp = htmlspecialchars($_POST['mdp']);
    $user_role = htmlspecialchars($_POST['role']);
    $submit = htmlspecialchars($_POST['submit']);

    if(isset($submit)){

    $requete = "INSERT INTO `user` (`user_pseudo`, `user_mail`, `user_mdp`, `user_role`)
                VALUES (:user_pseudo, :user_mail, :user_mdp, :user_role);";
    $prepare = $connexion->prepare($requete);
    $prepare->execute(array(
    ":user_pseudo" => $user_pseudo,
    ":user_mail" => $user_mail,
    ":user_mdp" => $user_mdp,
    ":user_role" => $user_role
    ));
    $resultat = $prepare->rowCount();

    if($resultat == 1){
        echo "Le nouveau compte " . $user_pseudo . " a bien été créé.";
    } else{
        echo "Une erreur s'est produite. Le nouveau compte " . $user_pseudo . " n'a pas pu être créé.";
    }
    }

} catch (PDOException $e) {
    exit("🚫" . $e->getMessage());

}
        ?>
        
    </main>
    <script src="src/js/app.js"></script>
</body>
</html>
