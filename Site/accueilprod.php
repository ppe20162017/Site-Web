<!DOCTYPE html>
<?php
session_start();
//on recupere la session de l'utilisateur par rapport a son login
if (!isset($_SESSION['login'])) {
    header ('Location: connexion.php');
    exit();
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
        <title>AGRUR</title>
    </head>

    <body>
    <header>
    <div id="logo">    
           <img class="img" src="logo.jpg" width="225" height="150" alt="" title="logo" />         
     </div>  
     </header> 
     </section>
        <nav>   
            <ul id="menu">
                <li><a href="accueilprod.php"> Accueil</a></li>
                <li> <a href="fourni_info_prod.php">Ajout Information</a></li>
                <li> <a href="affiche_info_prod.php">Mes Informations</a></li>
                <li><a href="ajoutverger.php">Ajoutez Verger</a></li>
                <li><a href="affiche_verger.php">Mes Vergers</a></li>
                <li><a href="livraison.php">Livraison</a></li>
                
            </ul>
        </nav> 

     <article>
        
           <h3> <?php echo 'Bonjour '.$_SESSION['login'].','?> et bienvenue sur notre site ! </h3>
           <strong>AGRUR</strong> est une coopérative agricole spécialiste de la noix française depuis 1929, elle collecte ses noix sèches de Grenoble auprès de nombreux nuciculteurs qui cultivent, en Rhône-Alpes, leurs vergers dans un total respect des règles environnementales et produisent des noix 100% origine France.</center></p>
           <br>
           <p><center>Grâce à un savoir-faire reconnu et une politique qualité rigoureuse, AGRUR est le numéro 1 de la noix française en Europe, avec une production annuelle moyenne de 7000 tonnes de noix.</center> </p>
    </article>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
 <a href="deconnexion.php">Déconnexion</a>
    </body>
</html>