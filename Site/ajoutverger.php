<!DOCTYPE html>
 <?php session_start();
 //on recupere la session de l'utilisateur par rapport a son login
    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }


 //on se connecte a la base de données
  require('connexionbdd.php');
  
  //on selectionne l'id de l'utilisateur connecté
  $sql = "SELECT idUser FROM user WHERE login='$login' ";

  // on execute la requete SQL
  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));

 // on retourne le données recupere dans la variable $data  
  $data = mysqli_fetch_array($req);

  // on attribue l'id de l'utilisateur connecté à la valeur $idUser
  $idUser=$data['idUser'];

// on selectionne l'id du producteur en fonction de son idUser
  $sql1 = "SELECT idProducteur FROM producteur WHERE idUser='$idUser' ";

  //on execute la requete SQL
  $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

    // on retourne le données recupere dans la variable $data
    $data = mysqli_fetch_array($req);

  // on attribue l'id du producteur connecté à la valeur $idProducteur  
  $idProducteur=$data['idProducteur'];

  

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
                <li> <a href="fourni_info_prod.php">Ajout Information</a></li>
                <li><a href="affiche_info_prod.php">Mes Informations</a></li>
                <li><a href="ajoutverger.php">Ajoutez Verger</a></li>
                <li><a href="affiche_verger.php">Mes Vergers</a></li>
                <li><a href="livraison.php">Livraison</a></li>
                              
            </ul>
        </nav> 

     <article>
           <div class="form-connexion">
<form method ="POST" action="ajoutverger.php"  >
    <div class="connexion">
        <h1>Ajoutez les vergers que vous possedez :</h1>
        <label> Entrez le nom de votre verger:<br> <br><input type="text" name="nomVerger" /></label>
        <label> Entrez la superficie de ce verger : <br><br><input type="text" name="superficie" /></label>
        <label> Entrez le nombre d'arbre par hectare de ce verger : <br><br><input type="text" name="hectare" /></label>
        <label> Dans quel commune se situe-t-il ? : <br><br><input type="text" name="nomCom" /></label>
        <label> Est-elle AOC ? : <br><br>
          <input  type= "radio" name="aoc_o_n_" value="oui"> Oui
         <input type= "radio" name="aoc_o_n_" value="non"> Non</label>
        <label> Quel est le type de noix cultivé ?<br><br>
         <input type= "radio" name="libelleVar" value="franquette"> La Franquette
         <input  type= "radio" name="libelleVar" value="mayette"> La Mayette
         <input type= "radio" name="libelleVar" value="parisienne"> La Parisienne</label>
   
       
        
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
        $nomVerger=$_POST['nomVerger'];
        $superficie=$_POST['superficie'];
        $hectare=$_POST['hectare'];
        $libelleVar=$_POST['libelleVar'];
        $nomCom=$_POST['nomCom'];
        $aoc_o_n_=$_POST['aoc_o_n_'];        
        $idProducteur=$data['idProducteur'];
        
        


        if($nomVerger&&$superficie&&$hectare&&$nomCom&&$aoc_o_n_&&$nomCom&&$idProducteur&&$libelleVar)
        {
            
          

           
             
              
              // on insere les données dans la table commune 
              $sql = "INSERT INTO commune(nomCom, aoc_o_n_) VALUES ('$nomCom','$aoc_o_n_')";
              // on execute la requete SQL
              mysqli_query ($connect,$sql);
             
            

              // on selectionne l'id de la commune en fonction du nom de la commune
              $sql1= "SELECT idCom FROM commune WHERE nomCom = '$nomCom'";

              //on execute la requete SQL
              $req = mysqli_query($connect,$sql1) or die('Erreur SQL !<br />'.$sql1.'<br />'.mysqli_error($connect));

                // on retourne le données recupere dans la variable $data
              $data = mysqli_fetch_array($req);

              //on attribue l'id de la commune a la variable $idCom
              $idCom = $data['idCom'];


            


              // on selectionne l'id de la variete qui correspond au libelle de la variete rentré
              $sql2= "SELECT idVar FROM variete WHERE libelleVar = '$libelleVar'";

              //on execute la requete SQL
              $req = mysqli_query($connect,$sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($connect));

               // on retourne le données recupere dans la variable $data
              $data = mysqli_fetch_array($req);

              //on attribue l'id de la variete a la variable $idVar
              $idVar = $data['idVar'];




             // on insert dans la table vergers  
             $sql3 = "INSERT INTO vergers(nomVerger, superficie, hectare, idVar, idCom, idProducteur) VALUES ('$nomVerger','$superficie','$hectare','$idVar','$idCom','$idProducteur')";

             // on execute la requete SQL
             mysqli_query ($connect,$sql3);

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