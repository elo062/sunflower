<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On déclare les variables
$dateResa = $_POST['dateResa'];
$lieu = $_POST['lieu'];
$duree = $_POST['duree'];
$message = $_POST['message'];
// On récupère l'id de la résa de la page updateResa.php
$idResa = $_GET['idResa'];

// On modifie les entrées dans la table reservation
$req = $bdd->prepare('UPDATE `sunflower`.`reservation` SET `dateResa` = :dateResa, `lieu` = :lieu, `duree` = :duree, `message` = :message WHERE `reservation`.`id` = :id_resa');
$req->execute(array(
  'dateResa' => $dateResa,
  'lieu' => $lieu,
  'duree' => $duree,
  'message' => $message,
  'id_resa' => $idResa
));

// Envoi du mail pour prévenir qu'il y a une résa :
require('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->Host = 'smtp.domaine.fr';
$mail->SMTPAuth   = false;
$mail->Port = 25; // Par défaut

// Expéditeur
$mail->SetFrom($_SESSION['email'], 'Nom Prénom');
// Destinataire
$mail->AddAddress('eloisemecozzi@gmail.com', 'Nom Prénom');
// Objet
$mail->Subject = htmlspecialchars('Modification réservation');

// Votre message
$msg='Nom :'.$_SESSION['nom'].'<br />
Lieu :'.$lieu.'<br />
Date de la réservation :'.$dateResa.'<br />
Durée : '.$duree.'<br />
Message : '.$message.'<br />
ID Résa : '.$idResa.'<br /><br />';

$mail->MsgHTML($msg);

// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
  echo 'Erreur : ' . $mail->ErrorInfo;
} else {
  echo 'Message envoyé !';
}

// Redirection vers la page finResa.php
header('Location:finResa.php');
?>
