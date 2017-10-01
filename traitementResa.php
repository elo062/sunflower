<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On déclare les variables name
$date = DateTime::createFromFormat('d/m/Y', $_POST['dateResa']);
$date = $date->format('Y-m-d');


$query = $bdd->prepare('INSERT INTO reservation(dateResa) VALUES(:dateResa)'); // $db étant une instance de PDO
$query->bindValue(':dateResa', $date, PDO::PARAM_STR);
$query->execute();


$duree = $_POST['duree'];
$lieu = $_POST['lieu'];
$message = $_POST['message'];

// Je veux modifier l'affichage de la date pour la mettre en français mais ça marche pas et de toute façon il enregistre 0000/00/00 en bdd !
// $req = $bdd->prepare('SELECT DATE_FORMAT(dateResa, "%d/%m/%Y") AS dateResa FROM reservation');


// On insère la réservation en bdd
$req = $bdd->prepare('INSERT INTO reservation(dateResa, duree, lieu, message) VALUES(:dateResa, :duree, :lieu, :message)');
$req->execute(array(
	'dateResa' => $date,
	'duree' => $duree,
  'lieu' => $lieu,
  'message' => $message
	));

header('Location:finResa.php');
?>
