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
           
    <div class="main">
                <div class="resultat">
                    <h2>Voila ce que nous avons trouvé pour toi</h2>

    </div>' ;

  <?php
         //1 CImporter la config et creer l'objet la connexion
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
        
    
  
        // only test
//        var_dump($_POST);
        
        $idLangue = $_POST['langue'];
        $idNiveau = $_POST['niveau'];
        $idMatiere = $_POST['matiere'];
        $idSousmatier = $_POST['sousmatier'];
//inser langue dans formulaire
        $sqlL = "SELECT ";
        
        
        
// requete global pour chercher des donnees 
        
        $sqlG = "select * from lien, matiere, sousmatier, langue, niveau
        where 
        lien.idSousMatiere = sousmatier.id
        and sousmatier.idMatiere = matiere.id
        and lien.idLangue = langue.id
        and lien.idNiveau = niveau.id
        and langue.id = :idLangue
        and sousmatier.id = :idSousmatier
        and matiere.id = :idMatiere
        and niveau.id = :idNiveau
        ";
        $statement = $bdd->prepare($sqlG);
        $statement-> bindValue (":idLangue", $idLangue);
        $statement-> bindValue (":idNiveau", $idNiveau);
        $statement-> bindValue (":idMatiere", $idMatiere);
        $statement-> bindValue (":idSousmatier", $idSousmatier);
        $statement->execute();
        $tableau = $statement ->fetchAll(PDO::FETCH_ASSOC);
//        var_dump ($tableau);
        foreach ($tableau as $lien){

            echo '<div class="resultatLien"><a href=" '.$lien['lien'].'" target="_blank">'.$lien['lien'].'</a></div></br>'; 
//            echo "<br>lien: ".$lien['lien'];
//            echo "<br>info: ".$lien['description'];
//            echo "<br>Language: ".$lien['Langue'];
//            echo "<br>";
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
    </body>
</html>
