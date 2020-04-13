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
                    <h1><span>Interface 3 </span> base de recherche les meilleurs liens pour améliorer votre connaissance des langangeges de programmation</h1>
                    <p> Bienvenue dans notre site web particulier qui a été designe pour tous qui se interesent a se developper vers les matieres informatiques et les langages de programmation </p>
		</div>
            </div> 
         </div>
        </header>
      
        <main>
            <section class="part2">
                <div class="container">
                    <div class="titles">
                        <h2> Log in </h2>
                        <br><br>
                <form action="./traitementFormLogin.php" method="POST">
                    <br>
            Votre email <input type ="text" name="email">
            Mot de passe <input type="password" name="pass">
            <button type="submit"> Se loger </button>  
        </form>
        </div>
         <div  class="titles">
         <h2> Vous n'avez pas encore un compte ? Enregister-vous! </h2>
         </div>
          <div  class="titles">
        <form action="./Inscription.php" method="POST">
           <button type="submit"> Inscription </button> 
        </form>
          </div>
       </div>
	
	
</section>
       
            
        
        </main>
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
