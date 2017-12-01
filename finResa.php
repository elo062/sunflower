<?php
session_start();
require_once ("header.php");
// Si le visiteur n'est pas connecté on le redirige vers la page de connexion
 if(!isset($_SESSION['id'])){
   header('Location:login.php');
 };
?>
<div class="texte">
  <p class="texte">
    Nous avons bien enregistré votre réservation et vous recontacterons dans les plus brefs délais.
  </p>
  <p class="texte">
    <a href='enregistrement.php'><input type='submit' value='Ajouter une réservation' class='button'></a>
    <a href='deconnexion.php'><input type='submit' value='Se déconnecter' class='button'></a>
  </p>
  <h1>Vos réservations :</h1>
</div>

<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On récupère tout le contenu de la table user
$reponse = $bdd->query('SELECT * FROM relation_user_resa
  JOIN reservation ON relation_user_resa.id_resa = reservation.id
  JOIN user ON relation_user_resa.id_user = user.id
  WHERE user.id = "'.$_SESSION['id'].'"
  ORDER BY dateResa DESC
  ');
$reservations = $reponse;

// On parcourt le tableau avec la boucle foreach pour afficher toutes les réservations :
foreach($reservations as $reservation)
{
	echo "<p class='reservations'>Date : " . $reservation['dateResa'] . "</p>";
	echo "<p class='reservations'>Lieu : " . $reservation['lieu'] . "</p>";
  echo "<p class='reservations'>Durée : " . $reservation['duree'] . " heure(s) </p>";
  echo "<p class='reservations'>Vous pouvez modifier ou annuler une réservation jusqu'à 3 mois avant l'événement.</p> <p class='reservations'>Autrement des pénalités vous seront imposées.</p>";
  echo "<p class='reservations'><a href='updateResa.php?idResa=" . $reservation['id_resa'] . "'><input type='submit' value='Modifier' class='button' name='idResa'></a>";
	// Lorsqu'on clique sur "annuler" on récupère l'id de la résa et on est redirigé vers la page supprimerResa.php pour le traitement
	echo "<a href='supprimerResa.php?idResa=" . $reservation['id_resa'] . "&idUser=" . $reservation['id_user'] . "'><input type='submit' value='Annuler' class='button' name='idResa'></a></p>";
	echo "<hr>";
}

require_once ("footer.php"); ?>
