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
  $login=$_POST['login'];
  $temp=$_POST['mdp'];
  $mdp = crypt($temp,'$2a$11$'.md5($temp).'$'); 

  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))){ 
    //on se connecte a la base de données
    require('connexionbdd.php');

  // on teste si une entrée de la base contient ce couple login / pass
  $sql = "SELECT * FROM user WHERE login='$login' && mdp='$mdp' ";

  $req = mysqli_query($connect,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connect));
  $data = mysqli_fetch_array($req);

  mysqli_fetch_assoc($req);
  mysqli_close($connect);
  // si on obtient une réponse, alors l'utilisateur est un membre
 if($data['mdp'] != $mdp) {
    echo '<p>Mauvais login / password. Merci de recommencer</p>';    
    exit;
  }
  else {
    session_start();
    $_SESSION['login'] = $login;

   if($data['profil'] == 'producteur')
    {
    header('location: accueilprod.php');
    }
 
    elseif($data['profil'] == 'administrateur')
    {
        header('location: listeProd.php');
    }
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
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
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