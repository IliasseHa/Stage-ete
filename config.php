<?php 
    $user='root';
    $pass='root';
        
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=testStage;', $user, $pass);
    }catch(PDOException $e)
    {
        print "Erreur :" . $e->getMessage(). "<br/>";
        die;
    }
?>