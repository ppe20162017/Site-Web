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
<form method ="POST" action="fourni_info_prod.php"  >
    <div class="connexion">
        <h1>Ajoutez vos informations personnelles</h1>
        <label> Entrez votre nom :<br> <br><input type="text" name="nomProd" /></label>
        <label> Entrez votre prenom : <br><br><input type="text" name="prenomProd" /></label>
        <label> Entrez le nom de votre societe : <br><br><input type="text" name="nomSociete" /></label>
        <label> Entrez l'adresse de votre societe : <br><br><input type="text" name="adresseSociete" /></label>
        <label> Entrez le nom de votre responsable de production : <br><br><input type="text" name="nomRespProd" /></label>
        <label> Entrez le prenom de votre responsable de production: <br><br><input type="text" name="prenomRespProd" /></label>
     <script>
  jQuery(function ($) {
    $('#dateAdhesion').datepicker( {
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
        <label />Quel est la date de votre  adhesion a Agrur ?  <br><br> <input id="dateAdhesion" name="dateAdhesion" > </label>
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
        $nomProd=$_POST['nomProd'];
        $prenomProd=$_POST['prenomProd'];
        $nomSociete=$_POST['nomSociete'];
        $adresseSociete=$_POST['adresseSociete'];
        $nomRespProd=$_POST['nomRespProd'];
        $prenomRespProd=$_POST['prenomRespProd'];
        $dateAdhesion=$_POST['dateAdhesion'];
        $idUser=$data['idUser'];
        
        


        if($nomProd&&$prenomProd&&$nomSociete&&$adresseSociete&&$nomRespProd&&$prenomRespProd&&$dateAdhesion&&$idUser)
        {
            
           

           // on insere les données dans la table producteur
              $sql = "INSERT INTO producteur(nomProd, prenomProd, nomSociete, adresseSociete, nomRespProd, prenomRespProd, idUser) VALUES ('$nomProd','$prenomProd','$nomSociete','$adresseSociete', '$nomRespProd','$prenomRespProd','$idUser')";

              //on execute la requete SQL
              mysqli_query ($connect,$sql);

              // on selectionne l'id du producteur qui correspond au nom du producteur
             $sql1= "SELECT idProducteur FROM producteur WHERE nomProd = '$nomProd'";

             //on execute la requete SQL
              $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

             // on retourne le données recupere dans la variable $data
              $data = mysqli_fetch_array($req);

  // on attribue l'id du producteur connecté à la valeur $idProducteur

              $idProducteur = $data['idProducteur'];

// on insere les données dans la table adherent
             $sql = "INSERT INTO adherent(dateAdhesion, idProducteur) VALUES ('$dateAdhesion','$idProducteur')";

             //on execute la requete SQL
              mysqli_query ($connect,$sql);




              die("Enregistrement terminé <a href='affiche_info_prod.php'>allez voir vos infos</a>");
            }
}
         

            ?>
    </article>

   
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>