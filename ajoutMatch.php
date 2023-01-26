<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>
<?php
        require 'connexion.php'; // Connect to the database
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajout d'une rencontre</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php require('header.php');?>


    <main>

        <article>
            <h1>Ajout d'une rencontre</h1>
            <form action="./fonction/FctAjouterMatch.php" method="post">
                <!-- DateHeure -->
                <div id="CM_DateHeure">
                    <label for ="dateHeure">Date et heure* : </label>
                    <input type="datetime-local" name="dateHeure" size="10"> 
                </div>
                 <!-- nomEquipeAdvers -->
                <div id="CM_nomAdv">
                    <label for="nomAdv">Nom de l'équipe adverse* : </label>
                    <input type="text"  name="nomAdv" size="10"> 
                </div> 
                 <!-- lieuDeRencontre -->
                <div id="CM_lieuDeRencontre">
                    <label for ="lieuDeRencontre">Lieu de rencontre* : </label>
                    <select name="lieuDeRencontre" >
                      <option value="domicile">Domicile</option>
                      <option value="exterieur">Extérieur</option>
                    </select>
                  </div>
                  <input type="submit" value="Submit">
            </form>
        </article>

        <!-- the aside content can also be nested within the main content -->
        <aside>
            <h2>Related</h2>
    
            <ul>
              <li><a href="insererJoueur.html">Ajouter un joueur</a></li>
              <li><a href="#">Matchs à venir</a></li>
              <li><a href="ajoutMatch.php">Ajouter un match</a></li>
              <li><a href="#">It never stops raining</a></li>
              <li><a href="#">Oh well...</a></li>
            </ul>
        </aside>

    </main>


    <footer>
      <p>Un site de Mendy PAUL et Patrick JEANJEAN</p>
	  <p> All right reserved</p>
    </footer>
  </body>
</html>