<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>
<?php
    require 'connexion.php';
    
    $dateHeure=$_POST['dateHeure'];
    $nomAdv=$_POST['nomAdv'];
    $lieuDeRencontre=$_POST['lieuDeRencontre'];
    
    ///Préparation de la requête
    $req = $linkpdo->prepare('INSERT INTO Rencontre(DateHeure, nomEquipeAdvers, lieuDeRencontre, scoreAdversaire, scoreEquipe) 
    VALUES(:DateHeure, :nomEquipeAdvers, :lieuDeRencontre, :scoreAdversaire, :scoreEquipe)');
    
    ///Exécution de la requête
    $req->execute(array('DateHeure'=> $dateHeure, 
                        'nomEquipeAdvers' => $nomAdv,
                        'lieuDeRencontre'=> $lieuDeRencontre,
                        'scoreAdversaire'=> NULL,
                        'scoreEquipe' => NULL));
    
    
    // Redirection vers la page des matchs
    header('Location: matchs.php');
    exit;
?>