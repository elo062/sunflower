<?php
session_start();
require_once("header.php");
require_once("./config/connexion.php");

// On définit la variable $idResa en récupérant le ? idResa = de la boucle foreach finResa.php
$idResa = $_GET['idResa'];
$idUser = $_SESSION['id'];

// On vérifie que la résa appartient à l'user pour qu'il ne puisse pas modifier celle d'un autre
$requete = $bdd->prepare('SELECT COUNT(id) AS nombreResa FROM relation_user_resa WHERE id_resa = :id_resa AND id_user = :id_user'); // :id_resa est inventé ici, il doit crspdre au 1er paramètre de bindParam
$requete->bindParam(':id_resa', $idResa);
$requete->bindParam(':id_user', $idUser);
$requete->execute();
$donneeResa = $requete->fetch();
if ($donneeResa['nombreResa'] == 0) {
  echo "<div class='texte'>Cette réservation ne vous appartient pas.</div>";
}else{
  // On sélectionne la résa à modifier :
  $requete = $bdd->prepare('SELECT * FROM reservation WHERE id = :id_resa'); // :id_resa est inventé ici, il doit crspdre au 1er paramètre de bindParam
  $requete->bindParam(':id_resa', $idResa);
  $requete->execute();


  // On exécute la requête
  while ($donnees = $requete->fetch())
  {
    // formulaire permettant de modifier une résa
    echo "<div class='texte'>
      <form method='post' action='traitementUpdateResa.php?idResa=".$idResa."' enctype='multipart/form-data'>
        <p>
          <label for='date'>Modifiez la date de l'événement :</label>
          <input type='date' name='dateResa'  value='" . $donnees['dateResa'] . "'/>
          <br />
          <label for='lieu'>Modifiez le lieu de l'événement :</label>
          <input type='text' name='lieu'  value='" . $donnees['lieu'] . "'/>
          <br />
          <label for='duree'>Modifiez sa durée (exprimée en heures) :</label>
          <input type='number' name='duree' placeholder='Ex : 2' size='2' value='" . $donnees['duree'] . "'/>
          <br />
          <label for='message'>Modifiez le message :</label>
          <input type='text' name='message'  value='" . $donnees['message'] . "'/>
          <br />
        </p>
        <input type='submit' name='envoyer' value='Envoyer' class='button'>
      </form>
    </div>";
  }
};

require_once("footer.php");
?>
