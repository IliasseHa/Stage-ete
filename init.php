<?php
//--------- BDD
$user='root';
$pass='root';
        
try{
    $bdd = new PDO('mysql:host=localhost;dbname=testStage;', $user, $pass);
}catch(PDOException $e)
{
    print "Erreur :" . $e->getMessage(). "<br/>";
    die;
}
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();
 
//--------- CHEMIN
define("RACINE_SITE","/site/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction-inscr.php");
?>