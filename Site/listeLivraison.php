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
                <li><a href="listecertifications.php">Certifications</a></li>
                <li><a href="listeclient.php">Nos Clients</a></li>
                 <li><a href="listeconditionnement.php">Conditionnement</a></li>
                <li><a href="listelivraison.php">Livraison</a></li>
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
                   $sql = "SELECT * FROM livraison  ";
                  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
                  while($data = mysqli_fetch_array($req)){
                    $idLivraison = $data['idLivraison'];

                    ?>


                <tr>
                <td><?php echo $data['idLivraison']; ?></td>
                <td><?php echo $data['dateLiv'];?></td>
                <td><?php echo $data['typeProduitLiv']; ?></td>
                <td><?php echo $data['quantiteLiv']; ?></td> 
                
                
                <?php
                

                  $idVergers=$data['idVergers'];

                
             
                  $sql1 = "SELECT nomVerger, idProducteur FROM vergers WHERE idVergers = '$idVergers'";                  
                 $req1 = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
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