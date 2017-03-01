<!DOCTYPE html>
 <?php session_start();
 //on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }


 //on se connecte a la base de données
require('connexionbdd.php');


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
<form method ="POST" action="attribuerCertif.php"  >
    <div class="connexion">
        <h1>Attribution de certification</h1>
  
     
        


        <label> Quel est la certification que vous voulez attribuer?<br> <br> <select name="libelleCertificat">

        <?php  $sql2 = "SELECT libelleCertificat FROM certificat";
        $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
        while($data = mysqli_fetch_array($req)) {  ?>        
        <option value ="<?php echo $data['libelleCertificat']; ?>"> <?php echo $data['libelleCertificat'];?></option>
        <?php } ?> </option></select></label> 




        <label> Quel est le producteur a qui vous voulez attribur cette certification ?<br> <br> <select name="nomProd">

        <?php  $sql2 = "SELECT nomProd FROM producteur";
        $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
        while($data = mysqli_fetch_array($req)) {  ?>        
        <option value ="<?php echo $data['nomProd']; ?>"> <?php echo $data['nomProd'];?></option>
        <?php } ?> </option></select></label>  
 <script>
  jQuery(function ($) {
    $('#dateObtention').datepicker( {
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
        <label />Quel est la date de cette obtention ?  <br><br> <input id="dateObtention" name="dateObtention" > </label>

      
        
   </div>
          
    <div class="button-connexion">
     <input type="submit" name="validation" />
     <input type="submit" value="Annuler" name="annulation"/>
    </div>
      <?php
    
     if(isset($_POST['validation']) )
     {  
        
        $dateObtention=$_POST['dateObtention'];
        $libelleCertificat=$_POST['libelleCertificat'];
        $nomProd=$_POST['nomProd'];
    
      
        
        


        if($nomProd&&$dateObtention&&$libelleCertificat)
       



          $sql1= "SELECT idProducteur FROM producteur WHERE nomProd = '$nomProd'";
              $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
              $data = mysqli_fetch_array($req);
              $idProducteur = $data['idProducteur'];

          $sql2= "SELECT idCertificat FROM certificat WHERE libelleCertificat = '$libelleCertificat'";
              $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));
              $data = mysqli_fetch_array($req);
              $idCertificat = $data['idCertificat'];

           
              $sql = "INSERT INTO avoir(dateObtention, idProducteur, idCertificat) VALUES ('$dateObtention','$idProducteur','$idCertificat')";
              mysqli_query ($connect,$sql);
              die("Attribution de la certification terminé <a href='listeProd.php'>retour a l'accueil</a>");
            }

         

            ?>
   </form>
    </article>

   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   

    </body>
</html>