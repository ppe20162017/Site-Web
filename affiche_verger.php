<!DOCTYPE html>
 <?php session_start();
 //on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }

 //on se connecte a la base de données
require('connexionbdd.php');

 $sql = "SELECT idUser FROM user WHERE login='$login' ";

  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idUser=$data['idUser'];

  $sql1 = "SELECT idProducteur FROM producteur WHERE idUser='$idUser' ";

  $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idProducteur=$data['idProducteur'];
 
  $sql2 = "SELECT nomVerger, superficie, hectare FROM vergers WHERE idProducteur='$idProducteur'";

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
                <li><a href="fourni_info_prod.php">Ajout Information</a></li>
                <li><a href="affiche_info_prod.php">Mes Informations</a></li>
                <li><a href="ajoutverger.php">Ajoutez Verger</a></li>
                <li><a href="affiche_verger.php">Mes Vergers</a></li>
                <li><a href="livraison.php">Livraison</a></li>
                              
            </ul>
        </nav> 

     <article>
           <div class="form-connexion">
<form method ="POST" action="affiche_info_prod.php"  >
    <div class="connexion">
    <h1>Mes Vergers</h1>
        <table>
                <tr>
                    <th> Nom du verger </th>
                    <th> Superficie</th>
                    <th> Nombre d'hectare</th>
               
                   
                </tr>
   <?php

  $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
 //On affiche les lignes du tableau une à une à l'aide d'une boucle
                  while($data = mysqli_fetch_array($req))
            {
            ?>
      <tr>
      <td><?php echo $data['nomVerger']  ; ?></td>
    <td> <?php echo $data['superficie']  ; ?> </td>
    <td>  <?php echo $data['hectare'] ;?></td>
    </tr>
    <?php
}
?>
   </div>
        </table>  
 </form>
 </div>
 </article>


    <footer>
    <a href="deconnexion.php">Déconnexion</a>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    
   
    </body>
</html>