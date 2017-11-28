<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On déclare les variables name
$dateResa = $_POST['dateResa'];
$lieu = $_POST['lieu'];
$duree = $_POST['duree'];
$message = $_POST['message'];
// On récupère l'id du plat de la page updatePlat.php
$idResa = $_GET['idResa'];


// On modifie une entrée dans la table plats
$req = $bdd->prepare('UPDATE `sunflower`.`reservation` SET `dateResa` = :dateResa, `lieu` = :lieu, `duree` = :duree, `message` = :message WHERE `reservation`.`id` = :id_resa');
$req->execute(array(
  'dateResa' => $dateResa,
  'lieu' => $lieu,
  'duree' => $duree,
  'message' => $message,
  'id_resa' => $idResa
));

// Redirection vers la page resultatPlat.php
header('Location:finResa.php');
?>
