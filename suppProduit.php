<?php
require_once("header.php");
require_once("./config/connexion.php");

// On définit la variable idPlat en récupérant l'ID de resultatPlat.php
$idPlat = $_GET['idPlat'];

// On supprime d'abord la relation entre les plats et le menu
// On entre dans le champ "id_menus" de la table "relation_menus_plats" pour supprimer l'ID du menu :
$requete = $bdd->prepare('DELETE FROM `relation_menus_plats` WHERE id_plats = :id_plats');
$requete->bindParam(':id_plats', $idPlat);
$requete->execute();

// On supprime le menu en lui-même
// On entre dans le champ de la bdd pour supprimer l'ID du menu:
$requete = $bdd->prepare('DELETE FROM `plats` WHERE id = :ID');
$requete->bindParam(':ID', $idPlat);
$requete->execute();

echo  "<p class='plat'>Votre plat a bien été supprimé !</p>";


require_once("footer.php");
 ?>
