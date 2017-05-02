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
// on selectionne les données de la table conditionnement
     $sql = "SELECT * FROM conditionnement";
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
       <div class="form-connexion">
<form method ="POST" action="listeCondi.php"  >
    <div class="connexion">
    <h1>Les types de conditionnements</h1>

  
      <br><br>
  <table>
 

   <tr>
       <th>Type </th>
       <th>Poids</th>
     

   </tr>
   <tr>
       <td>Sachet</td>
       <td>250 gr</td>
    
   </tr>
   <tr>
       <td>Sachet</td>
       <td>500 gr</td>
       
   </tr>
     <tr>
       <td>Sachet</td>
       <td>1 kg</td>
       
   </tr>
     <tr>
       <td>Filet</td>
       <td>1 kg</td>
         <tr>
       <td>Filet</td>
       <td>5 kg</td>
       
   </tr>
     <tr>
       <td>Filet</td>
       <td>10 kg</td>
       
   </tr>
     <tr>
       <td>Filet</td>
       <td>25 kg</td>
       
   </tr>
     <tr>
       <td>Carton</td>
       <td>10 kg</td>
       
   </tr>
       
   </tr>
</table>

                    
                   
              

     
    

</tr>
 
       

  

</table>
</div>
</form>
<div class="button-connexion">
    <a href="ajoutCondi.php"> <input type="submit" value="Ajouter un type de conditionnement" /></a>
     </div>
</div></article>
   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>