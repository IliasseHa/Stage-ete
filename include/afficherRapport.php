<?php 

    $user = $_SESSION['user'];
    $check = $bdd->prepare('SELECT nom, email, password, numero_etudiant, statut FROM compte WHERE numero_etudiant = ?');
    $check->execute(array($user));
    $data = $check->fetch();

    


    if(isset($_POST["rechercher"])){
        require_once 'include/recherche.php'; 
    }
    else{
        $chemin='../uploads/';
        if ($handle = opendir($chemin)) {
            while (false !== ($entry = readdir($handle))) {
                
                if($entry!== "." && $entry!== ".." && $entry!== ".DS_Store" && $data['statut']==1 ){
                    $chem=$chemin.$entry;
                    $chemins='<a href=' . $chemin . $entry .' target="_blank"/><p>' . $entry . '<p/>
                            <a href="" title="Supprimer"><img src="include/img/trash.png" alt="Supprimer" /></a>
                            <form action="" method="post">
                            <div class="stars">
                                <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
                            </div>
                            <input type="hidden" name="note" id="note" value="0">
                            <button type="submit">Valider</button>
                            </form>
                        
                            <script src="include/etoile.js"></script>';
                    echo $chemins;  
                }
                elseif($entry!== "." && $entry!== ".." && $entry!== ".DS_Store" && $data['statut']==0 ){
                    $chem=$chemin.$entry;
                    $doc = $bdd->prepare('SELECT numero_etudiant FROM StageChemin WHERE chemin = :chem ');
                    $doc->execute(array('chem'=>$chem));
                    $da = $doc->fetch();
                    if($da['numero_etudiant']==$data['numero_etudiant']){
                        $chemins="<a href=" . $chemin . $entry . " target='_blank'/><p>" . $entry . "<p/><a href='' title='Supprimer'><img src='include/img/trash.png' alt='Supprimer' /></a>";
                        echo $chemins;
                        
                    }
                    elseif($da['numero_etudiant']!==$data['numero_etudiant']){
                        $chemins="<a href=" . $chemin . $entry . " target='_blank'/><p>" . $entry . "<p/>";
                        echo $chemins;  
                    }
                    
                   
                }
            
            }

            closedir($handle);
        }
    }
            
?>