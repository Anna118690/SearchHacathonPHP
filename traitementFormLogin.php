<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
         <header>
          <div class="container">
            <div class="header_image">
		<div class="title">
                    <h1><span>Interface 3 </span> Votre compte </h1>
                   
		</div>
            </div> 
         </div>
        </header>
        <?php

        include "./config/configUsers.php";
        try {

            $bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
                ';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS); 
        }
        catch (Exception $e){
            echo $e->getMessage();
            //var_dump ($e);
            //echo "Un erreur s'est produite!";
            //header ("location: http://www.lesoir.be");
            die();
        }

       
        $email = $_POST['email'];
        $pass = $_POST['pass'];

       
        $sql = "SELECT * FROM users WHERE email=:email";
        $statement = $bdd->prepare($sql);
        $statement->bindValue(":email",$email);

        if ($statement->execute()){
            // pas d'erreur dans la requête
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            if ($res === false){
                // login n'existe pas dans la BD
                echo "<div id='reponse2'> Vous n'avez pas un compte. Inscrivez-vous maintenant ! </div>";
                 echo "<img id='userFoto' src='./imgUpload/default.jpg'/>";
                 
                 
            }
            else {                
                if (password_verify($_POST['pass'], $res['pass'])){
                    // pass incorrect
                   
                    echo "<div id='reponse2'> Password incorrect, essayez encore une fois !</div>";
                }
                else{
                    // login et pass correctes
                    echo "<div id='reponse2'> Vous êtes connectée. Bienvenue "."<span>".$res['email']."</span>. ". "Maintenant vous avez un acces a upload un lien. " ." Votre foto: </div>";
                
                    echo "<img id='userFoto' src='./imgUpload/".$res['foto']."'/>";
                    echo "<ul id='login2'><li><a href='formInsertLink.php'>AJOUTER UN LIEN</a></li></ul>";
                   
                }
            }
        }
        else {
            echo "Problème dans la requête";
            var_dump( $statement->errorInfo());
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