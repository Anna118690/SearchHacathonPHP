<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

        <head>
        <meta charset="UTF-8">
        <title>Interface 3 - les meilleures links pour apprendre langages de programmation </title>
        <link rel="stylesheet" type="text/css"  href="styles/styleSearch.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/fontawesome.css">
         <script src="https://kit.fontawesome.com/27881258f4.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800&display=swap" rel="stylesheet">
    </head>
    <body>
        
        
    <div class="container">
            
     <nav>
        <div class="container">
            <div class="navbar">
                <div class=icone_interface>
                    <img src="images/company_logo.png" alt="logo">
                </div>
                <div class="menu">
                    <ul>
                            <li><a href="Search.php"><span>I3SEARCH</span></a></li>
                            <li><a href="Login.php">SE CONNECTER</a></li>
                            <li><a href="Inscription.php">INSCRIVEZ VOUS</a></li>
                    </ul>
                </div>
             </div>
        </div>
     </nav>
        
        
        
        
        
        <?php
 
         //1 Importer la config et creer l'objet la connexion
        include"./config/configLien.php";
        try {
            $bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
                        ';dbname='.DBNAME.';charset='
                       .DBCHARSET,DBUSER,DBPASS); 
                }
        catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        
    
//        var_dump ($_POST);
            $idMatiere = $_POST['matiere'];
            $lien = $_POST['txt_lien'];
            $description = $_POST['description'];
            $idLangue = $_POST['langue'];
            $idNiveau = $_POST['niveau'];   
            $idSousMatier = null;
            
        if ($_POST['sousmatier'] === 'rajouter'){
                // nouvelle sousmatiere qui se trouve dans la cle nouvellesousmatiere
                $nouvellesousmatier = $_POST['nouvelleSousMatiere'];
                // inserer la sousmatiere dans la bd
                $sql = "INSERT INTO sousmatier (sousmatier,idMatiere) VALUES (:sousmatiere,:idMatiere) ";

                $statement = $bdd->prepare($sql);
                $statement-> bindValue (":sousmatiere", $nouvellesousmatier);
                $statement-> bindValue (":idMatiere", $idMatiere);         
                if (!$statement->execute()){
                    var_dump ($statement->errorInfo());
                    die();
                }
                
                // nouvelle sous matiere, obtenir l'id de la sousmatiere qu'on vient d'inserer
                $idSousMatier = $bdd->lastInsertId();
//                var_dump ($idSousMatier);
                
        } 
        else {
            // pas de nouvelle sous matiere, on recoit l'id sousmatiere du propre formulaire
                $idSousMatier = $_POST['sousmatier'];
            
        }

        //inserer dans tous les cas le lien
                
                // ATTENTION AUX NOMS DE COLONNES!!!!!!!!!!

                
                    $sql = "INSERT INTO lien (lien, description, idLangue, idNiveau, idSousMatiere) VALUES (:lien, :description, :idLangue, :idNiveau,:idSousMatier) ";
                    $statement = $bdd->prepare($sql);
                    $statement-> bindValue (":lien", $lien);
                    $statement-> bindValue (":description", $description);
                    $statement-> bindValue (":idLangue", $idLangue);
                    $statement-> bindValue (":idNiveau", $idNiveau);
                    $statement-> bindValue (":idSousMatier", $idSousMatier);
                    if (!$statement->execute()){
                        var_dump ($statement->errorInfo());

                    } else {
                        echo '<h2 class="resultatLien2">Merci d\'avoir participé</h2>';
                        echo "<img id='userFoto' src='./images/giphy.gif'/>";
                        
                    }
                  
        


                ?>
        
           <footer>

                 
                    <div class="container">
                        <div class="footerText">
                            <div >
                               <h3><strong>&#9400; Anna Aurélie Hélène Iza - HACKATHON 2019</strong></h3>
                            </div>
                            <div class="menu">
                                        <a href=""><i class="fab fa-facebook-f"></i></a> 
                                          <a href=""><i class="fab fa-twitter"></i></a>
                                          <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                            </div>
                         </div>
                        
                

              </footer>
            </div>



    </body>
</html>
