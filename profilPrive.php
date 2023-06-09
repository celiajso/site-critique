<?php
session_start();

//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Import du site
require_once("./includes/constantes.php");      //constantes du site
require_once("./includes/config-bdd.php");      
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
        
        <meta name="author" content="JOSSO Célia, NORTON Thomas">
        <meta name="author" content="ESIR, CUPGE">

        <link rel="icon" href="Images/icone.png">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/nav.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/pagePrive.css">
        <link rel="stylesheet" href="styles/avis.css">
    </head>

    <body>
        <?php include("./static/header.php"); ?>
        <?php include("./static/nav.php"); ?>
        <?php displayPrivatePage($my_sqli); ?>
        <?php include("./static/footer.php"); ?>

    </body>
                
</html>
<?php closeDB($my_sqli); ?>
