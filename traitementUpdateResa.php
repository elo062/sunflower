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

// try catch = bonne pratique pour signaler une erreur à l'internaute


// On modifie une entrée dans la table plats
$req = $bdd->prepare('UPDATE `sunflower`.`reservation` SET `dateResa` = :dateResa, `lieu` = :lieu, `duree` = :duree, `message` = :message WHERE `reservation`.`id` = :id_resa');
$req->execute(array(
  'dateResa' => $dateResa,
  'lieu' => $lieu,
  'duree' => $duree,
  'message' => $message,
  'id_resa' => $idResa
));


// Envoi du mail pour prévenir qu'il y a une résa :
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->Host = 'smtp.domaine.fr';
$mail->SMTPAuth   = false;
$mail->Port = 25; // Par défaut

// Expéditeur
$mail->SetFrom('eloisemecozzi@gmail.com', 'Nom Prénom');
// Destinataire
$mail->AddAddress('eloise@gmail.com', 'Nom Prénom');
// Objet
$mail->Subject = 'Modification réservation';

// Votre message
$mail->MsgHTML(echo $dateResa, $lieu, $duree, $message, $idResa);

// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
  echo 'Erreur : ' . $mail->ErrorInfo;
} else {
  echo 'Message envoyé !';
}


// Redirection vers la page resultatPlat.php
header('Location:finResa.php');
?>
