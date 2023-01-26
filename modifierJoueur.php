<?php
//session_start();
//if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  //  header('Location: login.php');
   // exit;
//}
?>
<?php
require 'connexion.php';

if(isset($_POST['modifierJoueur'])) {
    $numLicence = $_POST['numLicence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ddn = $_POST['ddn'];
    $poste = $_POST['poste'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];

    $update = $linkpdo->prepare("UPDATE Joueur SET nom = :nom, prenom = :prenom, ddn = :ddn, postePref = :poste, taille = :taille, poids = :poids WHERE numLicence = :numLicence");
    $update->bindParam(':numLicence', $numLicence);
    $update->bindParam(':nom', $nom);
    $update->bindParam(':prenom', $prenom);
    $update->bindParam(':ddn', $ddn);
    $update->bindParam(':poste', $poste);
    $update->bindParam(':taille', $taille);
    $update->bindParam(':poids', $poids);
    $update->execute();

    header('Location: joueur.php');
    exit;
}

if(isset($_GET['numLicence'])) {
    $numLicence = $_GET['numLicence'];
    $select = $linkpdo->prepare("SELECT * FROM Joueur WHERE numLicence = :numLicence");
    $select->bindParam(':numLicence', $numLicence);
    $select->execute();
    $joueur = $select->fetch();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un joueur</title>
</head>
<body>
    <h1>Modifier un joueur</h1>
    <form method="post">
        <input type="hidden" name="numLicence" value="<?php echo $joueur['numLicence']; ?>">
        <label>Nom:</label>
        <input type="text" name="nom" value="<?php echo $joueur['nom']; ?>">
        <br>
        <label>Prénom:</label>
        <input type="text" name="prenom" value="<?php echo $joueur['prenom']; ?>">
       <label>Date de naissance:</label>
        <input type="date" name="ddn" value="<?php echo $joueur['ddn']; ?>">
        <br>
        <label>Poste préféré:</label>
        <input type="text" name="poste" value="<?php echo $joueur['postePref']; ?>">
        <br>
        <label>Taille:</label>
        <input type="number" name="taille" value="<?php echo $joueur['taille']; ?>">
        <br>
        <label>Poids:</label>
        <input type="number" name="poids" value="<?php echo $joueur['poids']; ?>">
        <br><br>
        <input type="submit" name="modifierJoueur" value="Modifier">
    </form>
</body>
</html>
