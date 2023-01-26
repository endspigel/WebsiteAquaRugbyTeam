<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>

<?php
    require 'connexion.php';

    // Récupération du numéro de licence du joueur à supprimer
    $numLicence = $_POST['numLicence'];

    // Ecriture de la requête
    $requete = $linkpdo->prepare("DELETE FROM Joueur WHERE numLicence = :numLicence");
    $requete->bindParam(':numLicence', $numLicence);
    $requete->execute();

    // Redirection vers la page des joueurs
    header('Location: joueur.php');
    exit;
?>