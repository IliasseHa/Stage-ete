<?php
    // fichier de connexion à la bdd
    include 'config.php';
    $user = $_SESSION['user'];
    $check = $bdd->prepare('SELECT nom, email, password, numero_etudiant, statut FROM compte WHERE numero_etudiant = ?');
    $check->execute(array($user));
    $data = $check->fetch();
    //récupère les chemins afin de parcourir la bdd    
    $reponse = $bdd->query("SELECT chemin, nom, prenom, numero_etudiant FROM StageChemin");
    
    //parcourir toute la base de données 
    while ($donnees = $reponse->fetch()){
        //attend que le formulaire de recherche soit validé
        if(isset($_POST["rechercher"])){

            $donnees['chemin']=str_replace(' ','_',$donnees['chemin']);
            include 'pdfparser-master/vendor/autoload.php';
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($donnees['chemin']);
            $text = $pdf->getText();
            // afficher les rapports concerné pour les élèves
            if (preg_match("/{$_POST["recherc"]}/i", $text ) && $data['statut']==0){
                $nom=str_replace("../uploads/","",$donnees['chemin']);
                //$chemins="<a href=".$donnees['chemin']." target='_blank'/><p>" . $nom . "<p/>";

                $doc = $bdd->prepare('SELECT numero_etudiant FROM StageChemin WHERE chemin = :chem ');
                $doc->execute(array('chem'=>$donnees['chemin']));
                $da = $doc->fetch();
                if($da['numero_etudiant']==$data['numero_etudiant']){
                    $chemins="<a href=" . $donnee['chemin'] . " target='_blank'/><p>" . $nom . "<p/><a href='' title='Supprimer'><img src='include/img/trash.png' alt='Supprimer' /></a>";
                    echo $chemins;
                    
                        
                }
                elseif($da['numero_etudiant']!==$data['numero_etudiant']){
                    $chemins="<a href=" . $donnee['chemin'] . " target='_blank'/><p>" . $nom . "<p/>";
                    echo $chemins;  
                }

                //echo $chemins."<br/>";
            
            }
            // afficher les rapports concerné pour les admins(professeur) | Permet de rechercher un nom, prenom ou numero etudiant
            if($data['statut']==1 ){
                if(preg_match("/{$_POST["recherc"]}/i", $text ) || preg_match("/{$_POST["recherc"]}/i", $donnees['nom'] ) || preg_match("/{$_POST["recherc"]}/i", $donnees['prenom'] ) || preg_match("/{$_POST["recherc"]}/i", $donnees['numero_etudiant']) ){
                    $nom=str_replace("../uploads/","",$donnees['chemin']);
                    $chemins='<a href=' . $donnees["chemin"] . ' target="_blank"/><p>' . $nom . '<p/>
                                <a href="" title="Supprimer"><img src="include/img/trash.png" alt="Supprimer" /></a>
                                <form action="" method="post">
                                <div class="stars">
                                    <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
                                </div>
                                <input type="hidden" name="note" id="note" value="0">
                                <button type="submit">Valider</button>
                                </form>
                            
                                <script src="include/etoile.js"></script>';
                    echo $chemins."<br/>";
                }
            }
                
        }           
    }
    
?>


