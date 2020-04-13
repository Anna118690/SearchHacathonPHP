<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un user a database </title>
        <link rel="stylesheet" type="text/css"  href="styles/style.css"/>
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
        
       
        
        <?php
        
       
                 session_start();
                 //var_dump($_POST);
               //  var_dump($_FILES); // pokazuje informacje o zalazonym pliku
        
        include"./config/configUsers.php";

        try {
     
            $bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
                        ';dbname='.DBNAME.';charset='
                       .DBCHARSET,DBUSER,DBPASS); 
                }
            catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
            $uploadDir = "./imgUpload/";
            $idUnique = uniqid().date("Y-m-d-h-i-s");
            $uploadFileBD = $idUnique.$_FILES['userFile']['name'];
            $uploadFile = $uploadDir.$idUnique.$_FILES['userFile']['name']; 
            //var_dump ($uploadFile); 
            move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile);
        
        
            
            // recupere le POST - zeby to ckto wisujena stronie w formularzu  przechodizlo do bazy danych
            $nom = $_POST['nom'];
            $email=$_POST['email'];
             $pass = $_POST['pass'];
            
            $passHash = password_hash ($pass, 
                        PASSWORD_DEFAULT,
                        ['cost' => 12]);
          
        
      
          $sql = "INSERT INTO users (id, nom, email, pass, foto) VALUES (null, :nom, :email, :pass, :foto)";
          $statement = $bdd ->prepare($sql);
          $statement->bindValue(':nom', $nom );
          $statement->bindValue(':email', $email);
          $statement->bindValue(':pass', $pass);
          $statement->bindValue(':foto', $uploadFileBD);
         
          
  
          if ($statement ->execute()){
              echo "<div id='reponse'> Votre compte a été créé, connectez-vous maintenant </div>";
              echo "<div id='login'> Log in </div>";
               echo "<ul id='login'><li><a href='Login.php'>Interface 3</a></li></ul>";
          }
          else {
              echo "<div id='reponse'>Problem!</div>";
              var_dump ($bdd->errorInfo());
              var_dump ($statement->errorInfo());
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
