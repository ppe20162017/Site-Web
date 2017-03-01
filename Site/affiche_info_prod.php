<!DOCTYPE html>
 <?php session_start();
 //on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }

 //on se connecte a la base de données
require('connexionbdd.php');

  // on teste si une entrée de la base contient ce couple login / pass
  $sql = "SELECT idUser FROM user WHERE login='$login' ";

  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idUser=$data['idUser'];
  $sql2 = "SELECT nomProd, prenomProd, nomSociete, adresseSociete, nomRespProd, prenomRespProd FROM producteur WHERE idUser='$idUser' ";

  $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $nomProd=$data['nomProd'];
  $prenomProd=$data['prenomProd'];
  $nomSociete=$data['nomSociete'];
  $adresseSociete=$data['adresseSociete'];
  $nomRespProd=$data['nomRespProd'];
  $prenomRespProd=$data['prenomRespProd'];


 $sql3 = "SELECT idProducteur FROM producteur WHERE nomProd='$nomProd' ";

  $req = mysqli_query($connect,$sql3) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idProducteur=$data['idProducteur'];

  $sql4 = "SELECT dateAdhesion FROM adherent WHERE idProducteur='$idProducteur' ";

  $req = mysqli_query($connect,$sql4) or die('Erreur SQL !<br />'.$sql4.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $dateAdhesion=$data['dateAdhesion']; 

  $sql5 = "SELECT idCertificat FROM avoir WHERE idProducteur='$idProducteur' ";

  $req = mysqli_query($connect,$sql5) or die('Erreur SQL !<br />'.$sql5.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idCertificat=$data['idCertificat']; 

  $sql6 = "SELECT libelleCertificat FROM certificat WHERE idCertificat='$idCertificat' ";

  $req = mysqli_query($connect,$sql6) or die('Erreur SQL !<br />'.$sql6.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $libelleCertificat=$data['libelleCertificat']; 









 

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
      
        <h1>Vos informations personnelles</h1>
      

        <label> Votre nom :<br> <br><input type="text" value= <?php echo $nomProd ?> name="nomProd" /></label>
        <label> Votre prenom :<br> <br><input type="text" value= <?php echo $prenomProd ?> name="prenomProd" /></label>
        <label> Le nom de votre société :<br> <br><input type="text" value= <?php echo $nomSociete ?> name="nomSociete" /></label>
        <label> L'adresse de votre societe:<br> <br><input type="text" value= <?php echo $adresseSociete ?> name="adresseSociete" /></label>
        <label> Le nom de votre responsable de production :<br> <br><input type="text" value= <?php echo $nomRespProd ?> name="nomRespProd" /></label>
        <label> Le prenom de votre responsable de production :<br> <br><input type="text" value= <?php echo $prenomRespProd ?> name="prenomRespProd" /></label>
        <label> Votre date d'adhesion a Agrur est le :<br> <br> <?php echo $dateAdhesion ?> </label>
        <label> Les certifications en votre possession :<br> <br> <?php echo $libelleCertificat ?> </label>
     
      
   </div>
          
    <div class="button-connexion">    
     <input type="submit" value="Retour à l'accueil" name="annulation" onclick="window.location.href='modif_info_client.php';"/>
      <input type="submit"  value="Valider les modifications" name="validation" />
    </div>
    </article>

<?php
if(isset($_POST['validation']) )

     {  
        $nomProd=$_POST['nomProd'];
        $prenomProd=$_POST['prenomProd'];
        $nomSociete=$_POST['nomSociete'];
        $adresseSociete=$_POST['adresseSociete'];
        $nomRespProd=$_POST['nomRespProd'];
        $prenomRespProd=$_POST['prenomRespProd'];
        
        $sql="UPDATE producteur SET nomProd='$nomProd',prenomProd='$prenomProd',nomSociete='$nomSociete',adresseSociete='$adresseSociete', nomRespProd='$nomRespProd', prenomRespProd='$prenomRespProd' WHERE idUser='$idUser' ";
        
        mysqli_query ($connect,$sql);
      }
?>



    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>