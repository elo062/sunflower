<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On déclare les variables name
$date = $_POST['date'];
$duree = $_POST['duree'];
$lieu = $_POST['lieu'];
$message = $_POST['message'];



// On ajoute une entrée dans la table menus
$req = $bdd->prepare('INSERT INTO reservation(dateResa, duree, lieu, message) VALUES(:dateResa, :duree, :lieu, :message)');
$req->execute(array(
	'date' => $date,
	'duree' => $duree,
  'lieu' => $lieu,
  'message' => $message
	));

header('Location:finResa.php');
?>
