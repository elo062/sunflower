<?php
require_once("header2.php");
require_once("./config/connexion.php");

// On définit la variable idAlbum en récupérant l'ID de resultatPlat.php
$idAlbum = $_GET['idAlbum'];

// On supprime d'abord la relation entre les plats et le menu
// On entre dans le champ "id_menus" de la table "relation_menus_plats" pour supprimer l'ID du menu :

// $requete = $bdd->prepare('DELETE FROM `relation_menus_plats` WHERE id_plats = :id_plats');
// $requete->bindParam(':id_plats', $idAlbum);
// $requete->execute();

// On supprime le menu en lui-même
// On entre dans le champ de la bdd pour supprimer l'ID du menu:
$requete = $bdd->prepare('DELETE FROM `boutique` WHERE id = :id');
$requete->bindParam(':id', $idAlbum);
$requete->execute();

echo  "<p class='texte'>Votre album a bien été supprimé de la boutique.</p>";
echo "<p class='texte'><a href='backoffice.php'><input type='submit' value='BackOffice' class='button' name='idAlbum'></a></p>";

require_once("footer.php");
 ?>
