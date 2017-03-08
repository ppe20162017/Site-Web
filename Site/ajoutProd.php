<!DOCTYPE html>
<?php
session_start();
//on recupere la session de l'utilisateur par rapport a son login
if (!isset($_SESSION['login'])) {
    header ('location: connexion.php');
    exit();
}
   
 //on se connecte a la base de données
require('connexionbdd.php');
     $sql = "SELECT * FROM producteur";
?>
  

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                <li><a href="listeProd.php"> Nos Producteurs</a></li>
                <li><a href="listecertifications.php">Certifications</a></li>
                <li><a href="listeclient.php">Nos Clients</a></li>
                 <li><a href="listeconditionnement.php">Conditionnement</a></li>
                <li><a href="listelivraison.php">Livraison</a></li>
                <li><a href="commandeclient.php">Commande</a></li>
                              
            </ul>
        </nav> 

         <div class="form-connexion">
<h1>Ajoutez Producteur</h1>
<form method ="POST" action="ajoutProd.php"  >
    <div class="connexion">
     
        <label> Entrez le login du nouveau producteur :<br> <br><input type="text" name="login" /></label>
        <label> Entrez le mot de passe : <br><br><input type="password" name="mdp" /></label>
   
   </div>
     
    <div class="button-connexion">
     <input type="submit" name="validation" />
     <input type="submit" value="Annuler" name="annulation"/>
    </div>
    
  <?php
    // on détermine si les variable validé sont NULL
     if(isset($_POST['validation']) )
     {  
         //on place dans des variable les valeurs passé en POST
        $login=$_POST['login'];
        $temp=$_POST['mdp'];
        // on crypte le mot de passe en md5 et on le fait commencer par $2a$11$
        $mdp = crypt($temp,'$2a$11$'.md5($temp).'$'); 
  
        

        
        

        // si login et mdp sont non null on poursuit
        if($login&&$mdp)
        {
          
           // on insere les valeurs dans user
              $sql = "INSERT INTO user (login, mdp, profil) VALUES ('$login','$mdp', 'producteur')";
            // on execute la requete SQL
              mysqli_query ($connect,$sql);

            die("Ajout Producteur terminée  <a href='listeProd.php'>retour a la liste</a>");
            }

        } 

            ?>
</form>
</div>
   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>