<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title>FormRecherche</title>
    </head>
    <body>
         <form action="./traitementFormRechercheLinks.php" method="POST">
        <div id='containerMain'>
            conection a la base
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
            requete dynamique - recherche dans la base des donneesniveau
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
            requete dynamique - recherche dans la base des donnees matiere
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
            requete dynamique - recherche dans la base des donnees sous categorie
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

            </div>  fin div main form 
            <br><br>
            
            
            
            
            <button type="submit">Chercher</button>
        </form>
        </div>  fin div container form 
        <script src="./mainSearch.js"></script>
       
 
    </body>
</html>-->
