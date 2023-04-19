<?php
session_start();
//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Import du site - A completer
require_once("./includes/constantes.php");      //constantes du site
require_once("./includes/config-bdd.php");      //constantes du site
include_once("./php/functions-DB.php");
include_once("./php/functions_query.php");
include_once("./php/functions_structure.php");
$my_sqli = connectionDB();
date_default_timezone_set('Europe/Paris');

?>

<!DOCTYPE html lang="fr">
    <head>
        <?php
            $num = $_GET['numero'];
            $sql_input = "SELECT login_Utilisateur from Utilisateur WHERE id_Utilisateur=$num;";
            $res_sql_input = readDB($my_sqli, $sql_input);

            $titre = $res_sql_input[0]['login_Utilisateur'];

            echo "<title>Gamecrit - $titre</title>"
        ?>
        
        <meta name="author" content="JOSSO Célia">
        <meta name="author" content="ESIR, CUPGE">

        <link rel="icon" href="Images/icone.png">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/nav.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/infosArticle.css">
    </head>

    <body>
        <?php include("./static/header.php"); ?>
        <?php include("./static/nav.php"); ?>
        <br>
        <?php

            if (isset($_GET["erreur"])) {
                if ($_GET["erreur"] == "age") {
                    echo "<div class='erreur-inscription'><h2>Erreur !</h2>Vous êtes trop jeune ! Vous devez avoir au moins 15 ans !<br><br></div>";
                }
                if ($_GET["erreur"] == "login"){
                    echo "<div class='erreur-inscription'><h2>Erreur !</h2>Ce nom d'utilisateur est déjà pris !<br><br></div>";
                }
                if ($_GET["erreur"] == "mdp"){
                    echo "<div class='erreur-inscription'><h2>Erreur !</h2>Le mot de passe confirmé est différent du mot de passe saisi !<br><br></div>";
                }
            }
            if (isset($_GET["success"])) {
                $champ = $_GET["success"];
                echo "<div class='erreur-inscription'><h2>$champ modifié avec succès !</div><br><br>";
            }
            $num = $_GET['numero'];
            $tab = getUserPrivateInformations($my_sqli, $num);
            displayUserPrivateInformations($my_sqli, $tab);
        ?>
        <?php include("./static/footer.php"); ?>
    </body>            
    <?php closeDB($my_sqli); ?>
</html>