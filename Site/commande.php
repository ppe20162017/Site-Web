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

  $sql1 = "SELECT idClient FROM client WHERE idUser='$idUser' ";

  $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idClient=$data['idClient'];
 




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
                <li><a href="accueilclient.php"> Accueil</a></li>
                <li><a href="fourni_info_client.php">Ajout Information</a></li>
                <li><a href="affiche_info_client.php">Mes Informations</a></li>
                <li><a href="cataloge.php">Productions</a></li>
                <li><a href="commande_client.php">Commande</a></li>
                              
            </ul>
        </nav> 

     <article>
         
           <div class="form-connexion">
<form method ="POST" action="commande.php"  >
    <div class="connexion">
        <h1>Passer une commande</h1>
  
     
        <label> Quel lot souhaitez-vous commander<br> <br> <select name="numLots">

        <?php  $sql2 = "SELECT * FROM lots ";
        $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
        while($data = mysqli_fetch_array($req)) {  ?>        
        <option value ="<?php echo $data['numLots']; ?>"> <?php echo $data['numLots'];?></option>
        <?php } ?> </option></select></label>  

       



        <?php
        $numLots=$data['numLots'];


 $sql = "SELECT idLivraison FROM lots WHERE numLots='$numLots' ";

  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $idLivraison=$data['idLivraison'];

  $sql1 = "SELECT quantiteLiv FROM livraison WHERE idLivraison='$idLivraison' ";

  $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);
  $quantiteLiv=$data['quantiteLiv'];

echo $quantiteLiv;

        ?>
 <script>
  jQuery(function ($) {
    $('#dateCom').datepicker( {
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
        <label />Quel est la date de cette commande ?  <br><br> <input id="dateCom" name="dateCom" > </label>


        <label > Quel conditionnement choisissez-vous?  <br><br><input name="conditionnement"> <br><br></label>

          <label />Sachet 250gr <input name="Sachet250" type="text" ></label>
          <label />Sachet 500gr <input name="Sachet500" type="text" > </label>
          <label />Sachet 1kg   <input name="Sachet1000" type="text"> </label>
          <label />Filet 1kg    <input name="Filet1000" type="text"> </label>
          <label />Filet 5kg    <input name="Filet5000" type="text"> </label>
          <label />Filet 10kg   <input name="Filet10000" type="text"> </label>
          <label />Filet 25kg   <input name="Filet25000" type="text"> </label>
          <label />Carton 10kg  <input name="Carton10000" type="text"> </label>
          <br>
          <br>
      
         <?php
 if(isset($_POST['conditionnement']) )
     { 

    $S250=$_POST['Sachet250'];
    $S500=$_POST['Sachet500'];
    $S1000=$_POST['Sachet1000'];
    $F1000=$_POST['Filet1000'];
    $F5000=$_POST['Filet5000'];
    $F10000=$_POST['Filet10000'];
    $F25000=$_POST['Filet25000'];
    $C10000=$_POST['Carton10000'];


  $quantite=$S250*250 + $S500*500 + $S1000*1000 + $F1000 * 1000 + $F5000 * 5000 + $F10000 * 10000 + $F25000 * 25000 + $C10000 * 10000;

  echo 'Total du poids du conditionnement '.$quantite.'Gr';

}
 $sql2="SELECT * FROM commande com, client cli, lots l WHERE com.idClient=cli.idClient AND l.numLots=com.numLots ";
      $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));
                  while($l = mysqli_fetch_array($req)){
      echo "<a href='./pdf.php?lot=".$l['numLots']."&com=".$l['numeroCommande']."&cli=".$l['idClient']."'>Votre bon de commande</a></td></tr>"; 
    }
    
    
  ?>
  </table></center>
  
  
</body>

</html>

   
   
    
   </div>

          
    <div class="button-connexion">
     <input type="submit" name="validation" />
     <input type="submit" value="Annuler" name="annulation"/>
    </div>

    </article>

   <?php


   if(isset($_POST['validation']) )
     {  
        
        $numLots=$_POST['numLots'];
        $dateCommande=$_POST['dateCom'];
        
        


           
              $sql = "INSERT INTO commande (dateCommande, numLots, idClient) VALUES ('$dateCommande', '$numLots','$idClient')";
              mysqli_query ($connect,$sql);

              $sql1 ="SELECT numeroCommande FROM commande WHERE numLots='$numLots' AND idClient='$idClient'" ;

             $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));
             $data = mysqli_fetch_array($req);
             $numeroCommande=$data['numeroCommande'];


             $sql2 ="INSERT INTO comporter (quantite, numeroCommande) VALUES ('$quantite','$numeroCommande')";
             mysqli_query ($connect,$sql2);



       
            }

        
   ?>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   

    </body>
</html>