<?php
    require_once "config.php";
    $chem="../uploads/".$_FILES["pdf"]["name"];
    if(isset($_POST["valider"])){
        
        $_FILES["pdf"]["name"]=str_replace(' ','_',$_FILES["pdf"]["name"]);
        
        $check = $bdd->prepare('SELECT chemin, note, nom, prenom, numero_etudiant FROM TEST WHERE chemin = :chem');
        $check->execute(array('chem' =>$chem ));
        $data = $check->fetch();
        $row = $check->rowCount();
        $name=$_FILES["pdf"]["name"];
        if (mysqli_num_rows($query) != 0)
        {
            echo "deja entrée";
        }
        else{
            $user = $_SESSION['user'];
            $check = $bdd->prepare('SELECT nom, prenom, email, password, numero_etudiant, statut FROM compte WHERE numero_etudiant = ?');
            $check->execute(array($user));
            $data = $check->fetch();
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $netudiant=$data['numero_etudiant'];
            $note=NULL;
            move_uploaded_file($_FILES["pdf"]["tmp_name"],"../uploads/".$_FILES["pdf"]["name"]);
            $chem=str_replace(' ','_',$chem);
            $insert = $bdd->prepare('INSERT INTO StageChemins(chemin, nom, prenom, note, numero_etudiant) VALUES(:chemin, :nom, :prenom, :note, :netudiant)');
            $insert->execute(array(
                'chemin' => $chem,
                'nom' => $nom,
                'prenom' => $prenom,
                'note' => $note,
                'netudiant' => $netudiant
                                    ));
            $chem='../uploads/'.$_FILES["pdf"]["name"];
            $chemin="<a href=".$chem." target='_blank'/><p>" . $name . "<p/>";
            echo $chemin;
            } 
    } 
    elseif(!isset($_POST["valider"])){
        $message="<p>Erreur de chargement<p/>";
        echo $message;
    
    }     
          
        
      
?>