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
                <li><a href="accueilclient.php"> Accueil</a></li>
                <li><a href="fourni_info_client.php">Ajout Information</a></li>
                <li><a href="affiche_info_client.php">Mes Informations</a></li>
                <li><a href="cataloge.php">Productions</a></li>
                <li><a href="commande_client.php">Commande</a></li>
                              
            </ul>
        </nav> 

     <article>
        



      <div class="form-connexion">
<form method ="GET" action="commande.php"  >
    <div class="connexion">
    <h1>Commandes</h1>


  <div class="button-connexion">
     <input type="submit" value="Passer une commande" /><br><br>
     </div>
   
          <table>
                <tr>
                <th>Numero de lot</th>
                    <th>Calibre</th>
                     <th>Type de produit</th>
                      <th>Quantité ( en Kg )</th>
                      <th> Variete</th>
                    
                        
                 
                    
                   
                </tr>

                
                <?php
                   $sql = "SELECT * FROM lots  ";
                  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
                  while($data = mysqli_fetch_array($req)){
                    $idLivraison=$data['idLivraison'];
                               ?>


                <tr>
                <td><?php echo $data['numLots']; ?></td>
                <td><?php echo $data['calibreLot'];?></td>
               
                
                
                <?php
                

                           
             
                  $sql1 = "SELECT * FROM livraison WHERE idLivraison = '$idLivraison'";                  
                 $req1 = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
                 while($data1 = mysqli_fetch_array($req1)){
                   $idVergers=$data1['idVergers']; ?>

                 
                <td> <?php echo $data1['typeProduitLiv'];?></td>
                 <td> <?php echo $data1['quantiteLiv'];?></td>



                 <?php
     $sql2 = "SELECT * FROM vergers WHERE idVergers = '$idVergers'";                  
                 $req2 = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));
                 while($data2 = mysqli_fetch_array($req2)){
                   $idVar=$data2['idVar']; ?>

                         <?php
     $sql3 = "SELECT * FROM variete WHERE idVar = '$idVar'";                  
                 $req3 = mysqli_query($connect,$sql3) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error($connect));
                 while($data3 = mysqli_fetch_array($req3)){
                   

                   ?>


               <td> <?php echo $data3['libelleVar'];?></td>


                 
              
                  <?php
                 }}}}
                  ?>



</tr></table></div></form></div>


   
    </article>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>