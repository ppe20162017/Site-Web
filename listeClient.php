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

 $sql = 'SELECT * FROM client';
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
<form method ="POST" action="listeClient.php"  >
    <div class="connexion">
    <h1>Nos Clients</h1>

    

  
        <table>
                <tr>
                    <th> Nom Client</th>
                    <th> Adresse client</th>
                    <th> Nom Responsabe d'achat</th>
                   
                </tr>
<?php 
 $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
                  while($data = mysqli_fetch_array($req))
            {
            ?>
     <tr>
    <td> <?php echo $data['nomClient']  ; ?> </td>
    <td> <?php echo $data['adresseClient']  ; ?> </td>  
    <td> <?php echo $data['nomRespAchat'] ;?></td>
       

    </tr>
        <?php
}
?>
    </table>


</div>
</form>
</div></article>
   </div>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>