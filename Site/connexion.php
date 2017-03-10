<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
        <title> AGRUR</title>
    </head>

    <body>
    <header>
    <div id="logo">    
           <img class="img" src="logo.jpg" width="225" height="150" alt="" title="logo" />         
     </div>  
     </header> 


<?php



// on teste si le visiteur a soumis le formulaire de connexion

if (isset($_POST['submit']) && $_POST['submit'] == 'Connexion') {
//on place dans des variable les valeurs passé en POST
  $login=$_POST['login'];
  $temp=$_POST['mdp'];
  // on crypte le mot de passe
  $mdp = crypt($temp,'$2a$11$'.md5($temp).'$'); 

  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))){ 
    //on se connecte a la base de données
    require('connexionbdd.php');

 //on selectionne dans la table user les données qui corresepondent au login et au mdp rentré
  $sql = "SELECT * FROM user WHERE login='$login' && mdp='$mdp' ";

//on execute la requete SQl
  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));

   // on retourne le données recupere dans la variable $data
  $data = mysqli_fetch_array($req);

//Retourne un tableau associatif qui correspond à la ligne récupérée ou NULL s'il n'y a plus de ligne.
  mysqli_fetch_assoc($req);

   //Ferme une connexion
  mysqli_close($connect);
  // si le mot de passe ne correpond pas
 if($data['mdp'] != $mdp) {
    echo '<p>Mauvais login / password. Merci de recommencer</p>';    
    exit;
  }
  else {
    // si il correspond on ouvre une session
    session_start();
    $_SESSION['login'] = $login;
// si son profil est producteur on l'envoi sur l'espace producteur
   if($data['profil'] == 'producteur')
    {
    header('location: accueilprod.php');
    }
 // si son profil est administrateur on l'envoi sur l'espace administrateur
    elseif($data['profil'] == 'administrateur')
    {
        header('location: listeProd.php');
    }
    //si son profil est client on l'envoi sur l'espcae client
    elseif($data['profil'] == 'client')
    {
        header('location: accueilclient.php');
    }
    else
    {
      echo"la connexion est impossible";
    }

    
   exit;

  }    
}
  else {
   
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    

    echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
  }
}
?>
   <div class="form-connexion">
                  <h1>Connexion</h1>
                        <form method="POST" action="connexion.php">
                         <div class="connexion">
                                <label> Entrez votre nom :<br> <br><input type="text" name="login" /></label>
                                <label> Entrez votre mot de passe : <br><br><input type="password" name="mdp" /></label>                              
                         </div>

                         <div class="button-connexion">
                                 <input type="submit" name="submit" value="Connexion"/>
                         </div>

                           <br>
                           <br>

                         </form>
                           <form method="POST" action="inscription.php">
                            <div class="button-inscription">
                             <input type="submit" value="Inscription " name="btninscription"/>
                            </div>                     
                           </form>
           </div>
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>

    </body>
</html>