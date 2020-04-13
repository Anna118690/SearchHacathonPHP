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
        <div class="google">
            <h1>I<span class="i3">3</span>Search</h1>
            <h2>Aide les autres en ajoutant un tuto </h2>

        </div>
    </div>
        <div class='formul'>
        <div id='containerForm'>
         
        <form id="formInsert" action="./traitementFormInsertLink.php" method="POST">         
            <div id='containerMain'>
<!--            conection a la base-->
                <?php
                include "./config/configLien.php"; // Database connection using PDO
                try {
                    $bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
                                ';dbname='.DBNAME.';charset='
                               .DBCHARSET,DBUSER,DBPASS); 
                        }
                catch (Exception $e) {
                    echo $e->getMessage();
                    die();
                }
        
                //requete dynamique - recherche dans la base des donnees langues 
                echo"<label>Langues</label>";
                $sqlL="SELECT langue,id FROM langue order by langue"; 
                /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                echo "<select name=langue value=''>Langue</option>"; // list box select command
                foreach ($bdd->query($sqlL) as $row){//Array or records stored in $row
                    echo "<option value=$row[id]>$row[langue]</option>"; 
                    /* Option values are added by looping through the array */ 
                }
                 echo "</select>";// Closing of list box
                ?>
        
            <label>Niveau</label>
            <!--requete dynamique - recherche dans la base des donneesniveau-->
            <?php
            $sqlN="SELECT niveau,id FROM niveau order by id"; 
            /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
            echo "<select name=niveau value=''>Niveau</option>"; // list box select command
            foreach ($bdd->query($sqlN) as $row){//Array or records stored in $row
                echo "<option value=$row[id]>$row[niveau]</option>"; 
            /* Option values are added by looping through the array */ 
            }
             echo "</select>";// Closing of list box
                ?>   

            <label>Matiere</label>          
            <!--requete dynamique - recherche dans la base des donnees matiere-->
            <?php
            $sqlM="SELECT matiere,id FROM matiere order by id"; 
            /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
            echo "<select id='select_matiere' name='matiere' value=''>Matiere</option>"; // list box select command
            foreach ($bdd->query($sqlM) as $row){//Array or records stored in $row
                echo "<option value=$row[id]>$row[matiere]</option>"; 
            /* Option values are added by looping through the array */ 
            }
             echo "</select>";// Closing of list box
                ?>

            <label>Sous-matiere</label>
            <!--requete dynamique - recherche dans la base des donnees sous categorie-->
            <?php

            $sqlSM="SELECT sousmatier,id FROM sousmatier order by sousmatier"; 
            /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
            echo "<select id='sousmatier' name='sousmatier' value=''>Matiere</option>"; // list box select command
            foreach ($bdd->query($sqlSM) as $row){//Array or records stored in $row
                echo "<option value=$row[id]>$row[sousmatier]</option>"; 
            /* Option values are added by looping through the array */ 
            }
            echo "<option value='rajouter'>NOUVELLE</option>";           
             echo "</select>";// Closing of list box
             ?>          

            </div> <!-- fin div main form -->
            <br><br>
            
            
            
            Lien<input name="txt_lien">
            Description<input name="description">
            
            
            
            <button type="submit">Inserer</button>
        </form>
        </div>
        </div> <!-- fin div container form -->
        
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
        <script src="./mainInsert.js"></script>
 
    </body>
</html>
