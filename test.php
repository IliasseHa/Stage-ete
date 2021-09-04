<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TEST</title>
    <link rel="stylesheet" href="">

</head>

    <body>

        <form method="post" action="test.php" enctype="multipart/form-data">

                <p>
                    <input type="file" name="pdf" accept=".pdf" /><br/>
                    <input type="submit" name="valider" value="Valider" />
                    <input type="search" name="recherche"/>
                    <input type="submit" name="rechercher" value="rechercher" />

                </p>

        </form>

        <div id="pdf"></div>
        
        <?php include 'include/Chemin.php' ?>

        <?php
            if('include/Chemin.php'==true){
                $chem='../uploads/'.$_FILES["pdf"]["name"];
                $chemin="<a href=".$chem." target='_blank'/><img class='photo' src='../image/pdf.png' width=70 alt='oui'/>";
                echo $chemin;
                echo '<script>
                var image = document.createElement("a"); 
                image.a = '. $chem .'; 
                var img = document.createElement("img")
                img.class="photo";
                img.src="/img/PDF-image.png";
                img.alt="oui";
                var div = document.getElementById("pdf");
                div.appendChild(image);
                div.appendChild(img);
                
                </script>';
            }
        ?>
        <br/>
        <?php
 
        // Include Composer autoloader if not already done.
        include 'pdfparser-master/vendor/autoload.php';
         
        // Parse pdf file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($chem);
         
        $text = $pdf->getText();
        
        
        
        
        // echo $text;
         

        
        ?>

    </body>
</html>