<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

    <body>

        <form method="post" action="test.php" enctype="multipart/form-data">

                <p>
                    <input type="file" name="pdf" accept=".pdf" /><br/>
                    <input type="submit" name="valider" value="Valider" />
                    <input type="search" name="recherc"/>
                    <input type="submit" name="rechercher" value="Rechercher" />

                </p>

        </form>
        <?php
        require_once 'include/config.php';
        // si la session existe pas soit si l'on est pas connecté on redirige
        if(!isset($_SESSION['user'])){
            header('Location:login/index.php');
            die();
        }
        
        $user = $_SESSION['user'];
        $check = $bdd->prepare('SELECT nom, prenom, email, password, numero_etudiant, statut FROM compte WHERE numero_etudiant = ?');
        $check->execute(array($user));
        $data = $check->fetch();
        var_dump($data['numero_etudiant']);
        var_dump($data['nom']);
        var_dump($data['prenom']);


        
    ?>

        <?php require_once 'include/afficherRapport.php'?>
        <script src='etoile.js'></script>

        <?php require_once 'include/ajout.php' ?>

        

        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>

    </body>
</html>