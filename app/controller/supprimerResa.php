<?php
require_once("header.php");
require_once("./config/connexion.php");

// On définit la variable idResa en récupérant l'id de finResa.php
$idResa = $_GET['idResa'];

// On entre dans le champ "id_resa" de la table "relation_user_resa" pour supprimer l'id de la résa :
$requete = $bdd->prepare('DELETE FROM `relation_user_resa` WHERE id_resa = :id_resa');
$requete->bindParam(':id_resa', $idResa);
$requete->execute();

// On entre dans le champ id-resa de la bdd pour supprimer l'id de la résa:
$requete = $bdd->prepare('DELETE FROM `reservation` WHERE id = :id');
$requete->bindParam(':id', $idResa);
$requete->execute();

echo  "<p class='texte'>Votre réservation a bien été supprimée.</p>";
echo "<div class='reservations'><div class='button'><a href='../view/old/enregistrement.php'>Réserver</a></div></div><br />";
echo "<div class='reservations'><div class='button'><a href='finResa.php'>Mes réservations</a></div></div>";


require_once("footer.php");
 ?>
