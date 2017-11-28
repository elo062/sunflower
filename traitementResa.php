<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

$date = $_POST['dateResa'];
$duree = $_POST['duree'];
$lieu = $_POST['lieu'];
$message = $_POST['message'];
$id_user=$_POST['id_user'];

// On insère la réservation en bdd
$req = $bdd->prepare('INSERT INTO reservation(dateResa, duree, lieu, message) VALUES(:dateResa, :duree, :lieu, :message)');
$req->execute(array(
	'dateResa' => $date,
	'duree' => $duree,
  'lieu' => $lieu,
  'message' => $message
	));
$id_resa=$bdd->lastInsertId();

// On insère la réservation en bdd
$req = $bdd->prepare('INSERT INTO relation_user_resa(id_user, id_resa) VALUES(:id_user, :id_resa)');
$req->execute(array(
	'id_user' => $id_user,
  'id_resa' => $id_resa
	));

header('Location:finResa.php');
?>
