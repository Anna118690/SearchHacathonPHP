
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

        $idMatiere = $_POST['matiereChoisie'];          
        $sqlG = "select id,sousmatier from sousmatier where idMatiere=:idMatiere";
        $statement = $bdd->prepare($sqlG);
        $statement->bindValue (":idMatiere", $idMatiere);
        $statement->execute();
        $tableau = $statement ->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode ($tableau);


 
     


        ?>
 