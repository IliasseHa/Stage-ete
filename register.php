<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php
        $db_username = 'root';
        $db_password = 'root';
        $db_name     = 'testStage';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');

        if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['email'], $_REQUEST['password'])){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
            $nom = stripslashes($_REQUEST['nom']);
            $nom = mysqli_real_escape_string($db, $nom); 
            $prenom = stripslashes($_REQUEST['prenom']);
            $prenom = mysqli_real_escape_string($db, $prenom); 
            // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($db, $email);
            // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($db, $password);
            //requéte SQL + mot de passe crypté
                $query = "INSERT into `compte` (nom, email, password)
                        VALUES ('$username', '$email', '".hash('sha256', $password)."')";
            // Exécuter la requête sur la base de données
                $res = mysqli_query($db, $query);
                if($res){
                    echo "<div class='sucess'>
                            <h3>Vous êtes inscrit avec succès.</h3>
                            <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                    </div>";
                    }
        }else{
        ?>
        <form class="box" action="" method="post">
        <h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
            <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="nom" placeholder="Nom" required />
        <input type="text" class="box-input" name="prenom" placeholder="prenom" required />
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
        </form>
        <?php } ?>
</body>
</html>