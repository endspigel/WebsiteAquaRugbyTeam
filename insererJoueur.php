<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>
  <?php
   require 'connexion.php';
   
   $numLicence=$_POST['numLicence'];
   $nom=$_POST['nom'];
   $prenom=$_POST['prenom'];
   $photo=$_POST['photo'];
   $ddn=$_POST['ddn'];
   $taille=$_POST['taille'];
   $poids=$_POST['poids'];
   $postePref=$_POST['postePref'];
   $commentaire=$_POST['commentaire'];
   $statut=$_POST['statut'];
         
    ///Préparation de la requête
    $req = $linkpdo->prepare('INSERT INTO Joueur(numLicence, nom, prénom, photo, ddn, taille, poids, postePref, commentaire, statut) 
                                    VALUES(:numLicence, :nom, :prenom, :photo, :ddn, :taille, :poids, :postePref, :commentaire, :statut)');
    
    ///Exécution de la requête
    $req->execute(array('numLicence' => $numLicence,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'photo' => null,
                                'ddn' => $ddn,
                                'taille' => $taille,
                                'poids' => $poids,
                                'postePref' => $postePref,
                                'commentaire' => $commentaire,
                                'statut' => $statut)); 
    
    // Redirection vers la page des joueurs
    header('Location: joueur.php');
    exit;
?>
