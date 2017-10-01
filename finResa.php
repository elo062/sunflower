<?php require_once ("header2.php"); ?>

<div class="texte">
  <p>Nous avons bien enregistré votre réservation et vous recontacterons dans les plus brefs délais.</p>
  <p>Vos réservations :</p>
</div>

<?php

// On se connecte à la bdd
require_once("./config/connexion.php");
// On récupère tout le contenu de la table user
$reponse = $bdd->query('SELECT * FROM user ORDER BY user.id DESC');
$users = $reponse;



// On parcourt le tableau avec la boucle foreach pour afficher le résultat :
foreach($users as $user)
{
				// echo "<p class='texte'>id : " . $user['ID'] . " </p>";
				echo "<div class='separation'><p class='texte'>Utilisateur : " . $user['username'] . " </p>";

				// On fait une jointure à gauche entre l'ID des plats de la table "plats" et l'id_menus de la table "relation_menus_plats"
				$resasUser = $bdd->query('SELECT *  FROM `relation_user_resa` LEFT JOIN reservation ON `relation_user_resa`.id_resa = resa.id WHERE `id_user` ="'.$user['id'] . '"');
				$resas = $resasUser;
				// En-dessous de chaque utilisateur on affiche ses réservations
				foreach($resas as $resa)
				{
	 				echo "<p class='texte'>Date" . $user['date'] . " : <br />" . $resa['nom'] . " </p>";
	 				echo "<p class='texte'>Lieu : " . $resa['lieu'] . "</p><br />";
          echo "<p class='texte'>Durée : " . $resa['duree'] . " heure(s) </p><br />";
          echo "<p class='texte'>Vous pouvez modifier ou annuler une réservation jusqu'à 3 mois avant l'événement. Autrement des pénalités vous seront imposées.<br />";
	        echo "<p class='texte'><a href='updateResa.php?idResa=" . $resa['id'] . "&idUser=" . $user['id'] . "'><input type='submit' value='Modifier' class='button' name='idResa'></a>";
					// Lorsqu'on clique sur "supprimer" on récupère l'ID du plat et on est redirigé vers la page supprimerPlat.php pour le traitement
	 				echo "<a href='supprimerResa.php?idResa=" . $resa['id'] . "&idUser=" . $user['id'] . "'><input type='submit' value='Annuler' class='button' name='idResa'></a></p>";
				}
				echo "<hr>";
}

require_once ("footer.php"); ?>
