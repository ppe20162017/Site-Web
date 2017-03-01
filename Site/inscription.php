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
     
     
     
          <div class="form-connexion">
<h1>Inscritpion</h1>
<form method ="POST" action="inscription.php"  >
    <div class="connexion">
        <h1>Client</h1>
        <label> Entrez votre login :<br> <br><input type="text" name="login" /></label>
        <label> Entrez votre mot de passe : <br><br><input type="password" name="mdp" /></label>
   </div>
     
    <div class="button-connexion">
     <input type="submit" name="validationconnexion" />
     <input type="submit" value="Annuler" name="annulationinscritpionclient"/>
    </div>
    
  <?php
    
     if(isset($_POST['validationconnexion']) )
     {  
        
        $login=$_POST['login'];
        $temp=$_POST['mdp'];
        $mdp = crypt($temp,'$2a$11$'.md5($temp).'$');  
        

        
        


        if($login&&$mdp)
        {
            //on se connecte a la base de données
          require('connexionbdd.php');

           
 
$sql1 = "SELECT login FROM user WHERE login = '$login'";

$req = mysqli_query($connect,$sql1); 
  $data = mysqli_fetch_array($req);
  mysqli_fetch_assoc($req);


if($data['login'] != 0) 
{
echo 'le login'. $login .' existe déjà';
exit;
} 
else{

   $sql = "INSERT INTO user (login, mdp, profil) VALUES ('$login','$mdp', 'client')";

              mysqli_query ($connect,$sql);
              die("Inscription terminée Client <a href='connexion.php'>connectez vous</a>");
}



             /* $sql = "INSERT INTO user (login, mdp, profil) VALUES ('$login','$mdp', 'client')";

              mysqli_query ($connect,$sql);
              die("Inscription terminée Client <a href='connexion.php'>connectez vous</a>");



             
            }

        } */
}
}
            ?>
</form>
</div>



    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>

    </body>
</html>
