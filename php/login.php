<?php
session_start();
//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Import du site - A completer
require_once("../includes/constantes.php");      //constantes du site
require_once("../includes/config-bdd.php");      //constantes du site
include_once("../php/functions-DB.php");
include_once("../php/functions_query.php");
// include_once("../php/functions_structure.php");
$my_sqli = connectionDB();

?>

<?php

$login = $_POST["login"];

$mdp = $_POST["mdp"];

$isMember = IsMember($my_sqli, $login, $mdp);

if ($isMember) {
    $sql_id = "SELECT prenom_Utilisateur FROM Utilisateur WHERE login_Utilisateur = '$login' AND password_Utilisateur= '$mdp'";
    $res_id = readDB($my_sqli, $sql_id);
    $prenom = $res_id[0]['id_dresseur'];
     
    $_SESSION['username'] = $username;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['is_connected'] = 1;
    closeDB($my_sqli);
    header("Location: ../index.php");
}
else {
    header("Location: ../connection.php?erreur=1");
}




?>