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
  $requete = $linkpdo->prepare('SELECT * FROM Rencontre');
    $requete2 = $linkpdo->prepare('SELECT * FROM Participer order by DateHeure');
      
  $requete->execute();
  $requete2->execute();
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
        <h2>Liste des matchs à venir</h2>
        <table>
            <tr>
                <th>Matchs</th>
                <th>Joueurs sélectionnés</th>
            </tr>
        <?php
                while($result = $requete->fetch()): ?>
                    <div class="card">
                        <div class="card-content">
                            <p><?php echo htmlspecialchars($result['DateHeure']); ?></p>
                            <p><?php echo htmlspecialchars($result['nomEquipeAdvers']); ?></p>
                            <p><?php echo htmlspecialchars($result['lieuDeRencontre']); ?></p>
                        </div>
                        <div class="card-extra">
                            <?php echo htmlspecialchars($result['scoreAdversaire'].' - '.
                                       htmlspecialchars($result['scoreEquipe'])); ?>
                        </div>
                    </div>
                    
                    
            <?php endwhile; ?>
        </table>
        <h2>Joueurs sélectionnés</h2>
        <?php 
                
                while($result2 = $requete2->fetch()): ?>
                    <ul class="listJ">
                        <li><?php echo htmlspecialchars($result2['numLicence']).' '.
                                       htmlspecialchars($result2['DateHeure']); ?>
                            <input type="checkbox" id="selectJoueur"></li>
                    </ul>
                    
            <?php endwhile; ?>
      </article>

      <aside>
        <?php require('related.php'); ?>
      </aside>

    </main>

    <?php require('footer.php'); ?>

  </body>
</html>
