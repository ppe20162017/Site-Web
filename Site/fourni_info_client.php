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
                <li><a href="affiche_info_client.php">Ajout Information</a></li>
                <li><a href="affiche_info_client.php">Mes Informations</a></li>
                <li><a href="cataloge.php">Productions</a></li>
                <li><a href="commande_client.php">Commande</a></li>
                              
            </ul>
        </nav> 

     <article>
           <div class="form-connexion">
<form method ="POST" action="fourni_info_client.php"  >
    <div class="connexion">
        <h1>Ajoutez vos informations personnelles</h1>
        <label> Entrez votre nom :<br> <br><input type="text" name="nomClient" /></label>
        <label> Entrez votre adresse : <br><br><input type="text" name="adresseClient" /></label>
        <label> Entrez le nom de votre responsable : <br><br><input type="text" name="nomRespAchat" /></label>
        
   </div>
          
    <div class="button-connexion">
     <input type="submit" name="validationconnexion" />
     <input type="submit" value="Annuler" name="annulationinscritpionclient"/>
    </div>
    </article>

    <?php
    // on détermine si les variable validé sont NULL
     if(isset($_POST['validationconnexion']) )
     {  
      //on place dans des variable les valeurs passé en POST 
        $nomClient=$_POST['nomClient'];
        $adresseClient=$_POST['adresseClient'];
        $nomRespAchat=$_POST['nomRespAchat'];
        $idUser=$data['idUser'];
        
        


        if($nomClient&&$adresseClient&&$nomRespAchat&&$idUser)
        {
            
       

           // on insere les données dans la table client
              $sql = "INSERT INTO client(nomClient, adresseClient, nomRespAchat, idUser) VALUES ('$nomClient','$adresseClient','$nomRespAchat','$idUser')";

              //on execute la requete SQL
              mysqli_query ($connect,$sql);
              die("Inscription terminée Client <a href='connexion.php'>connectez vous</a>");
            }

        } 

            ?>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>