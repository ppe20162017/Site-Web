<!DOCTYPE html>
 <?php session_start();
//on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }

//on se connecte a la base de données

 require('connexionbdd.php');

  // on selectionne l'id de l'utilisateur connecté 
 $sql = "SELECT idUser FROM user WHERE login='$login' ";

//on execute la requete SQL
  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));

   // on retourne le données recupere dans la variable $data
  $data = mysqli_fetch_array($req);

    //on attribue l'id de l'utilisateur a la variable $idUser
  $idUser=$data['idUser'];

  // on selectionne l'id du producteur qui est connecté
  $sql1 = "SELECT idProducteur FROM producteur WHERE idUser='$idUser' ";

//on execute la requete SQL
  $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

  // on retourne le données recupere dans la variable $data
  $data = mysqli_fetch_array($req);

  //on attribue l'id du producteur a la variable $idProducteur
  $idProducteur=$data['idProducteur'];
 




?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                <li> <a href="fourni_info_prod.php">Ajout Information</a></li>
                <li><a href="affiche_info_prod.php">Mes Informations</a></li>
                <li><a href="ajoutverger.php">Ajoutez Verger</a></li>
                <li><a href="affiche_verger.php">Mes Vergers</a></li>
                <li><a href="livraison.php">Livraison</a></li>
                              
            </ul>
        </nav> 

     <article>
         
           <div class="form-connexion">
<form method ="POST" action="livraison.php"  >
    <div class="connexion">
        <h1>Livraison pour Agrur</h1>
  
     
        <label> De quel verger provient cette livraison ?<br> <br> <select name="nomVerger">



        <?php 

        //on selectionne le nom du verger en fonction de l'id du producteur
         $sql2 = "SELECT nomVerger FROM vergers WHERE idProducteur='$idProducteur'";

         //on execute la requete SQL
        $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));


   // on retourne le données recupere dans la variable $data
        while($data = mysqli_fetch_array($req)) {  ?>


        <option value ="<?php echo $data['nomVerger']; ?>"> <?php echo $data['nomVerger'];?></option>
        <?php } ?> </option></select></label>  
 <script>
  jQuery(function ($) {
    $('#dateLiv').datepicker( {
        //Paramètre pour mettre le datepicker en français + sous la forme yyyy-mm-dd + limite de date (en jour)
        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'yy-mm-dd',
        minDate : -730,
        maxDate : 730
    });
    $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
});
  </script>
        <label />Quel est la date de cette livraison ?  <br><br> <input id="dateLiv" name="dateLiv" > </label>


        <label> Quel est le type de produit livré ? <br><br>

         <input type= "radio" name="typeProduitLiv" value="entiere fraiche"> Entiere Fraiche
         <input  type= "radio" name="typeProduitLiv" value="entiere seche"> Entiere Seche</label>

        <label> Quel est la quantité livré ? (en Kg) <br><br><input type="text" name="quantiteLiv" /></label>
      
        
   </div>
          
    <div class="button-connexion">
     <input type="submit" name="validation" />
     <input type="submit" value="Annuler" name="annulation"/>
    </div>
     <?php
    // on détermine si les variable validé sont NULL
     if(isset($_POST['validation']) )
     {  
         //on place dans des variable les valeurs passé en POST 
        $dateLiv=$_POST['dateLiv'];
        $typeProduitLiv=$_POST['typeProduitLiv'];
        $quantiteLiv=$_POST['quantiteLiv'];
        $nomVerger=$_POST['nomVerger'];
      
        
        


        if($nomVerger&&$dateLiv&&$typeProduitLiv&&$quantiteLiv)
       


// on selectionne l'id du verger en fonction du nom de verger
          $sql1= "SELECT idVergers FROM vergers WHERE nomVerger = '$nomVerger'";

        //on execute la requete SQL
              $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

               // on retourne le données recupere dans la variable $data
              $data = mysqli_fetch_array($req);

              //on attribue l'id du verger a la variable $idVergers
              $idVergers = $data['idVergers'];


            //on insere les données dans la table livraison
              $sql = "INSERT INTO livraison(dateLiv, typeProduitLiv, quantiteLiv, idVergers) VALUES ('$dateLiv','$typeProduitLiv','$quantiteLiv','$idVergers')";
              //on execute la requete SQL
              mysqli_query ($connect,$sql);
              die("Enregistrement terminé <a href='affiche_info_prod.php'>allez voir vos infos</a>");
            }

         

            ?>
    </article>

   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   

    </body>
</html>