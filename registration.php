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

?>

<!DOCTYPE html lang="fr">

    <head>
        <title>Gamecrit</title>
        <meta name="author" content="NORTON Thomas, JOSSO Célia">
        <meta name="author" content="ESIR, CUPGE">
        
        <link rel="icon" href="Images/icone.png">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/nav.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/form.css">
    </head>

    <?php include("./static/header.php"); ?>
    <?php include("./static/nav.php"); ?>
    <?php
        if (isset($_GET["erreur"])) {
            if ($_GET["erreur"] == "age") {
                echo "Vous êtes trop jeune ! Vous devez avoir au moins 15 ans !";
            }
            if ($_GET["erreur"] == "login"){
                echo "Ce nom d'utilisateur est déjà pris !";
            }
            if ($_GET["erreur"] == "mdp"){
                echo "Le mot de passe confirmé est différent du mot de passe saisi !";
            }
    }
    ?>
    <?php
        echo "<div class='form-style-5'>";
            echo "<form action='./php/inscription.php' method='POST'>";
              echo "<fieldset>";
                echo "<br>";
                echo "<legend>";
                    echo "<span class='number'>";
                        echo "1";
                    echo "</span>";
                    echo "Vos informations personnelles";
                echo "</legend>";
                echo "<div class='form-content'>";
                    echo "<div class='left-column'>";
                        if (isset($_GET['nom'])) {
                            $nom = $_GET['nom'];
                            echo "<input type='text' name='nom' placeholder='Nom *' value='$nom' required>";
                        }
                        else {
                            echo "<input type='text' name='nom' placeholder='Nom *' required>";
                        }

                        if (isset($_GET['prenom'])) {
                            $prenom = $_GET['prenom'];
                            echo "<input type='text' name='prenom' placeholder='Prénom *' value='$prenom' required>";
                        }
                        else {
                            echo "<input type='text' name='prenom' placeholder='Prénom *' required>";
                        }
                        
                        
                    echo "</div>";
                    echo "<div class='right-column'>";
                    if (isset($_GET['mail'])) {
                        $mail = $_GET['mail'];
                        echo "<input type='email' name='mail' placeholder='Adresse mail *' value='$mail' required>";
                    }
                    else {
                        echo "<input type='email' name='mail' placeholder='Adresse mail *' required>";
                    }

                    if (isset($_GET['naissance'])) {
                        $naissance = $_GET['naissance'];
                        echo "<input type='date' name='naissance' placeholder='Date de naissance *' value='$naissance' required>";
                    }
                    else {
                        echo "<input type='date' name='naissance' placeholder='Date de naissance *' required>";
                    }
                    
                    echo "</div>";
                echo "</div>";
                echo "<br>";
                echo "<legend>";
                    echo "<span class='number'>";
                        echo "2";
                    echo "</span>";
                    echo "Vos identifiants";
                echo "</legend>";
                echo "<br>";
                echo "<div class='form-content'>";
                    echo "<div class='left-column'>";
                    if (isset($_GET['login'])) {
                        $login = $_GET['login'];
                        echo "<input type='text' name='login' placeholder='Login *' value='$login' required>";
                    }
                    else {
                        echo "<input type='text' name='login' placeholder='Login *' required>";
                    }

                    if (isset($_GET['mdp'])) {
                        $mdp = $_GET['mdp'];
                        echo "<input type='password' name='mdp' placeholder='Mot de passe *' value='$mdp' required>";
                    }
                    else {
                        echo "<input type='password' name='mdp' placeholder='Mot de passe *' required>";
                    }

                    if (isset($_GET['mdp_confirmation'])) {
                        $mdp_confirmation = $_GET['mdp_confirmation'];
                        echo "<input type='password' name='mdp-confirmation' placeholder='Confirmation du mot de passe *' value='$mdp_confirmation' required>";
                    }
                    else {
                        echo "<input type='password' name='mdp-confirmation' placeholder='Confirmation du mot de passe *' required>";
                    }

                    echo "</div>";
                    echo "<div class='right-column'>";
                        echo "<p class='question-form'>Souhaitez-vous choisir maintenant votre photo de profil ?</p>";
                    echo "<div id='case-pp' class='form-content'>";
                            echo "<div id='case-oui'>";
                                echo "<label class='container'>Oui";
                                    echo "<input id='a-cocher-pour-pp' type='radio' name='choix-pp'>";
                                    echo "<span class='radiomark'></span>";
                                    echo "<br><br>";
                                    echo "<div class='si-pp'>";
                                        echo "<p class='question-form'>LAISSER CHOISIR PHOTO PROFIL</p>";
                                    echo "</div>";
                                echo "</label>";
                            echo "</div>";
                            echo "<div class='right-column' id='case-non'>";
                                echo "<label class='container'>Non";
                                    echo "<input type='radio' name='choix-pp' checked>";
                                    echo "<span class='radiomark'></span>";
                                echo "</label>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";   
            echo "</fieldset>";
            echo "<input type='submit' value='Inscription'>";         
            echo "</form>";
        echo "</div>";
    echo "<br><br><br><br>";
    ?>
    <?php include("./static/footer.php"); ?>
<html>