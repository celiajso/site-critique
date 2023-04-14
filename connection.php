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
//include_once("./php/functions_query.php");
//include_once("./php/functions_structure.php");
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

    <div class="form-style-5">
            <form action="POST">
              <fieldset>
                <br>
                <legend>
                    <span class="number">
                        1
                    </span>
                    Vos informations personnelles
                </legend>
                <div class="form-content">
                    <div class="left-column">
                        <input type="text" name="field1" placeholder="Nom *" required>
                        <input type="text" name="field1" placeholder="Prénom *" required>
                    </div>
                    <div class="right-column">
                        <input type="email" name="field2" placeholder="Adresse mail *" required>
                        <input type="date" name="field2" placeholder="Date de naissance *" required>
                    </div>
                </div>
                <br>
                <legend>
                    <span class="number">
                        2
                    </span>
                    Vos identifiants
                </legend>
                <br>
                <div class="form-content">
                    <div class="left-column">
                        <input type="text" name="field1" placeholder="Nom d'utilisateur *" required>
                        <input type="text" name="field1" placeholder="Mot de passe *" required>
                        <input type="text" name="field1" placeholder="Confirmation du mot de passe *" required>
                    </div>
                    <div class="right-column">
                        <p class="question-form">Souhaitez-vous choisir maintenant votre photo de profil ?</p>
                    <div id="case-pp" class="form-content">
                            <div id="case-oui">
                                <label class="container">Oui
                                    <input id="a-cocher-pour-pp" type="radio" name="choix-pp">
                                    <span class="radiomark"></span>
                                    <br><br>
                                    <div class="si-pp">
                                    <p class="question-form">LAISSER CHOISIR PHOTO PROFIL</p>
                                    </div>   
                                </label>
                            </div>
                            <div class="right-column" id="case-non">
                                <label class="container">Non
                                    <input type="radio" name="choix-pp" checked>
                                    <span class="radiomark"></span>
                                </label>
                            </div>
                        </div> 
                    </div>
                </div>        
            </fieldset>
            <input type="submit" value="S'inscrire" disabled>                
            </form>
        </div>
    <br><br><br><br>
    <?php include("./static/footer.php"); ?>
<html>