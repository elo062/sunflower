<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

$date = $_POST['dateResa'];
$duree = $_POST['duree'];
$lieu = $_POST['lieu'];
$message = $_POST['message'];
$id_user=$_POST['id_user'];
echo $date;
try{
	$req = $bdd->prepare('SELECT COUNT(id) AS dateResaBdd FROM `reservation` WHERE `dateResa` = :dateResa ');
	$req->execute(array(
	  'dateResa' => $date
		));
		$dateResa = $req->fetch();

		if($dateResa['dateResaBdd'] == 1){
			header('Location:enregistrement.php?message=erreurDate');
			exit;
		}
}
catch (Exception $e) {
    echo 'La date choisie est déjà prise, merci de choisir une autre date.';
}

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
