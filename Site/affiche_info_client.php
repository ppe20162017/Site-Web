<!DOCTYPE html>
 <?php session_start();
 //on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }



    //on se connecte a la base de données
    require('connexionbdd.php');

  // on recupere l'id de l'utilisateur connecté
  $sql = "SELECT idUser FROM user WHERE login='$login' ";

  // on execute la requete SQL 
  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));

  // on retourne le données recupere dans la variable $data
  $data = mysqli_fetch_array($req);

  // on attribue l'id de l'utilisateur connecté à la valeur $idUser
  $idUser=$data['idUser'];

  // on recupere tout les informations de l'utilisateur
  $sql2 = "SELECT * FROM client WHERE idUser='$idUser' ";

  // on execute la requete SQL 
  $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));

  // on retourne le données recupere dans la variable $data
  $data = mysqli_fetch_array($req);
 

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
<form method ="POST" action="affiche_info_client.php"  >
    <div class="connexion">
      
        <h1>Vos informations personnelles</h1>

        <label> Votre nom :<br> <br><input type="text" value= <?php echo $data['nomClient'] ?> name="nomClient" /></label>
        <label> Votre adresse :<br> <br><input type="text" value= <?php echo $data['adresseClient'] ?> name="adresseClient" /></label>
        <label> Le nom de votre responsable d'achat :<br> <br><input type="text" value= <?php echo $data['nomRespAchat'] ?> name="nomRespAchat" /></label>

        
        
   </div>
          
    <div class="button-connexion">  
          <input type="submit"  value="Valider les modifications" name="validation" />  
     <input type="submit" value="Retour à l'accueil" name="annulation" onclick="window.location.href='modif_info_client.php';"/>

    </div>
    </article>

<?php
// on détermine si les variable validé sont NULL
if(isset($_POST['validation']) )

     {  
//on place dans des variable les valeurs passé en POST
        $nomClient=$data['nomClient'];
        $adresseClient=$_POST['adresseClient'];
        $nomRespAchat=$_POST['nomRespAchat'];

//on modifie les informations dans client        
        $sql="UPDATE client SET nomClient='$nomClient',adresseClient='$adresseClient',nomRespAchat='$nomRespAchat' WHERE idUser='$idUser' ";
     // on execute la requete SQL
        mysqli_query ($connect,$sql);
      }
?>



    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>