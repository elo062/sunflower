<?php
session_start();
require_once ("header2.php");
?>

<div class="texte">
  <p>Nous avons bien enregistré votre réservation et vous recontacterons dans les plus brefs délais.</p>
</div>
<div class="texte">
  <h1>Vos réservations :</h1>
</div>

<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
echo $_SESSION['id'];
// On récupère tout le contenu de la table user
$reponse = $bdd->query('SELECT * FROM relation_user_resa
  JOIN reservation ON relation_user_resa.id_resa = reservation.id
  JOIN user ON relation_user_resa.id_user = user.id
  WHERE user.id = "'.$_SESSION['id'].'" ');
$reservations = $reponse;

// On parcourt le tableau avec la boucle foreach pour afficher le résultat :
foreach($reservations as $reservation)
{
				echo "<div class='separation'><p class='texte'>Utilisateur : " . $reservation['prenom'] . " </p>";
				// On fait une jointure à gauche entre l'ID des réservations de la table "reservation" et l'id_user de la table "relation_user_resa"
	 				echo "<p class='texte'>Date" . $reservation['dateResa'] . " : <br />" . $reservation['nom'] . " </p>";
	 				echo "<p class='texte'>Lieu : " . $reservation['lieu'] . "</p><br />";
          echo "<p class='texte'>Durée : " . $reservation['duree'] . " heure(s) </p><br />";
          echo "<p class='texte'>Vous pouvez modifier ou annuler une réservation jusqu'à 3 mois avant l'événement. Autrement des pénalités vous seront imposées.<br />";
	        echo "<p class='texte'><a href='updateResa.php?idResa=" . $reservation['id'] . "&idUser=" . $reservation['id'] . "'><input type='submit' value='Modifier' class='button' name='idResa'></a>";
					// Lorsqu'on clique sur "supprimer" on récupère l'ID du plat et on est redirigé vers la page supprimerPlat.php pour le traitement
	 				echo "<a href='supprimerResa.php?idResa=" . $reservation['id_resa'] . "&idUser=" . $reservation['id_user'] . "'><input type='submit' value='Annuler' class='button' name='idResa'></a></p>";
				echo "<hr>";
}

require_once ("footer.php"); ?>
