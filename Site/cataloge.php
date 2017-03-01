<!DOCTYPE html>
<?php
session_start();
//on recupere la session de l'utilisateur par rapport a son login
if (!isset($_SESSION['login'])) {
    header ('location: connexion.php');
    exit();
}
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
        
           <h3>Notre coopeerative propose 3 types de Noix de Grenobles</h3>
           <strong>La Franquette</strong></center></p>
         <img src="franquette.jpg" alt="La franquette" >
         <p><center>La franquette est une variété de noyer commun (Juglans regia).
Elle provient de Notre-Dame-de-l'Osier dans l'Isère. Le noyer est vigoureux, productif, fertile et rustique. Sa floraison tardive (protandre) lui permet la culture en zone de gel tardif.
Il donne une noix de gros calibre, excellente, à coquille fine et cerneau aisé à extraire1.</center></p>
           <p><center>Elle représente actuellement 80% du verger de Quercy Périgord. Elle est à la fois adaptée au marché de la noix de table et du cerneau. Elle s’énoise facilement et a une très bonne qualité gustative. Elle a une coque allongée et un arôme délicat.</center> </p>
              <strong>La Mayette</strong></center></p>
         <img src="mayette.jpg" alt="La Mayette" >
         <p><center>La Mayette est une noix dont la coquille fine peut se casser entre les doigts est presque aussi savoureuse. Elle est plus grosse, aplatie à son extrémité et son amande est jaune clair.</center></p>
           
              <strong>La Parisienne</strong></center></p>
         <img src="parsienne.jpg" alt="La Parisienne" >
         <p><center>La Parisienne est la reine des noix de table. Elle est petite et ronde et se coquille est ferme. Son amande blanche représente environ 45% de son poids total. Le goût est fin sans être piquant.</center></p>
          <br><br><br>

          <p><center>Les differenrs type de conditionnement proposé par Agrur</center></p>
          <p><center> le sachet (de 250 g, 500 g et 1 kg), le filet (de 1 kg, 5 kg, 10 kg et 25 kg) et le carton de 10 kg. </center></p>
    </article>
    
    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
   
    </body>
</html>