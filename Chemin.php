<?php
    $id=@mysqli_connect("localhost","root","root","testStage") or die("Erreur de connexion");
    $message="";
    $chem="../uploads/".$_FILES["pdf"]["name"];
    if(isset($_POST["valider"])){
        $_FILES["pdf"]["name"]=str_replace(' ','_',$_FILES["pdf"]["name"]);
        move_uploaded_file($_FILES["pdf"]["tmp_name"],"../uploads/".$_FILES["pdf"]["name"]);
        mysqli_query($id,"insert into TEST(chemin) values('$chem')");
        //$chem='../uploads/'.$_FILES["pdf"]["name"];
        //$chemin="<a href=".$chem." target='_blank'/><img class='photo' src='/img/PDF-image.png' alt='oui'/>";
        return true;
        
        //echo $chemin;
        }   
        else{
            $message.="<p>Erreur de chargement<p/>";
            echo $message;
        }   
        
      
?>