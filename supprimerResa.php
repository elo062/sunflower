<?php
require_once("header2.php");
require_once("./config/connexion.php");

// On définit la variable idPlat en récupérant l'ID de resultatPlat.php
$idResa = $_GET['idResa'];

// On supprime d'abord la relation entre les plats et le menu
// On entre dans le champ "id_menus" de la table "relation_menus_plats" pour supprimer l'ID du menu :
$requete = $bdd->prepare('DELETE FROM `relation_user_resa` WHERE id_resa = :id_resa');
$requete->bindParam(':id_resa', $idResa);
$requete->execute();

// On supprime le menu en lui-même
// On entre dans le champ de la bdd pour supprimer l'ID du menu:
$requete = $bdd->prepare('DELETE FROM `reservation` WHERE id = :id');
$requete->bindParam(':id', $idResa);
$requete->execute();

echo  "<p class='texte'>Votre réservation a bien été supprimée.</p>";


require_once("footer.php");
 ?>
