<?php
$doc = $bdd->prepare('SELECT note FROM StageChemin WHERE chemin = :chem ');
$doc->execute(array('chem'=>$chem));
$da = $doc->fetch();
if(isset($_POST["noter"]) && $da['note']==NULL){

    $insert = $bdd->prepare('INSERT INTO StageChemin(note) VALUES(:note)');
    $insert->execute(array(
    'note' => $_POST["noter"],
    ));
    



}

?>