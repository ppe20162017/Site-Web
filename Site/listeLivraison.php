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
<form method ="GET" action="creationLot.php"  >
    <div class="connexion">
    <h1>Les livraisons des producteurs</h1>


  <div class="button-connexion">
     <input type="submit" value="Creer un lot" />
     </div>
   
          <table>
                <tr>
                <th>Numero de livraison</th>
                    <th>Date de livraison</th>
                     <th>Type de produit</th>
                      <th>Quantité</th>
                       <th>Nom du verger</th>
                        
                 
                    
                   
                </tr>

                
                <?php
                //on selectionne les données de la table livraison
                   $sql = "SELECT * FROM livraison  ";

                   //on execute la requete SQL
                  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));


              // on retourne le données recupere dans la variable $data
                  while($data = mysqli_fetch_array($req)){

                    //on attribue l'id de livraison dans la variable $idLivraison
                    $idLivraison = $data['idLivraison'];

                    ?>


                <tr>
                <td><?php echo $data['idLivraison']; ?></td>
                <td><?php echo $data['dateLiv'];?></td>
                <td><?php echo $data['typeProduitLiv']; ?></td>
                <td><?php echo $data['quantiteLiv']; ?></td> 
                
                
                <?php
                
                //on attribue l'id du verger dans la variable $idVergers
                  $idVergers=$data['idVergers'];

                
             // on selectionne les données de la table vergers qui correspondent a l'id vergers
                  $sql1 = "SELECT nomVerger, idProducteur FROM vergers WHERE idVergers = '$idVergers'";

                  // on execute la requete SQL                  
                 $req1 = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

                 // on retourne le données recupere dans la variable $data1
                 while($data1 = mysqli_fetch_array($req1)){ ?>

                 
                <td> <?php echo $data1['nomVerger'];?></td>
               


                 
              
                  <?php
                 }}
                  ?>




          



</tr>

</table>
        







</form>

</div>
</article>
   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>