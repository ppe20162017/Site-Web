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
// on selectionne les données de la table certificat
     $sql = "SELECT * FROM certificat";
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
                    <li><a href="listeProd.php"> Nos Producteurs</a></li>
                <li><a href="listeCertifications.php">Certifications</a></li>
                <li><a href="listeClient.php">Nos Clients</a></li>
                 <li><a href="listeConditionnement.php">Conditionnement</a></li>
                <li><a href="listeLivraison.php">Livraison</a></li>
                <li><a href="commandeclient.php">Commande</a></li>
                              
            </ul>
        </nav> 

     <article>
           <div class="listeProd">
<form method ="POST" action="attribuerCertif.php"  >
   <div class="tableau">
    <h1>Les certifications</h1>

    <div class="button-connexion">
     <input type="submit" value="Attribuer une certifications" />
     </div>
      <br><br>
        <table>
                <tr>
                    <th> <center>Nom de la certification</center></th>
                 
                    
                   
                </tr>
<?php

// on execute la requete SQL
  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
// on retourne le données recupere dans la variable $data
                  while($data = mysqli_fetch_array($req))
            {
            ?>
      <tr>
      <td><?php echo $data['libelleCertificat']  ; ?></td>
</tr>
 
       

    
  <?php
}
?>

</table>
</div>
</form>
<div class="button-connexion">
    <a href="ajoutCertif.php"> <input type="submit" value="Ajouter une certifications" /></a>
     </div>
</div></article>
   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>