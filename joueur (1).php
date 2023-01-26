<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>

<?php
  require 'connexion.php';
         
  ///Ecriture de la requête
  $requete = $linkpdo->prepare('SELECT * FROM Joueur');
          
  $requete->execute();
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">

    <title>Rugby sous-marin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <?php require('header.php');?>

    <main>
      <article>
        <h2>Liste des joueurs</h2>
            <?php 
                while($result2 = $requete->fetch()): ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="path/to/image.jpg" alt="Joueur">
                        </div>
                        <div class="card-content">
                            <p><?php echo htmlspecialchars($result2['prénom']).' '.htmlspecialchars($result2['nom']) ?></p>
                            <p>Numéro de licence: <?php echo htmlspecialchars($result2['numLicence']) ?></p>
                            <p>Date de naissance : <?php echo htmlspecialchars($result['ddn']) ?></p>
                        </div>
                        <div class="card-extra">
                            <p>Poste: <?php echo htmlspecialchars($result2['postePref']) ?></p>
                            <p>Taille: <?php echo htmlspecialchars($result2['taille']) ?></p>
                            <p>Poids : <?php htmlspecialchars($result['poids']) ?></p>
                        </div>
                        <div class="card-action">
                            <form action="deleteJoueur.php" method="post">
                                <input type="hidden" name="numLicence" value="<?php echo htmlspecialchars($result2['numLicence']) ?>">
                                <input type="submit" value="Supprimer">
                            </form>
                            <form action="modifierJoueur.php" method="post">
                                <input type="hidden" name="numLicence" value="<?php echo htmlspecialchars($result2['numLicence']) ?>">
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
                    </div>
            <?php endwhile; ?>

      </article>

      <aside>
        <?php require('related.php'); ?>
      </aside>

    </main>
    <?php require('footer.php'); ?>

  </body>
</html>