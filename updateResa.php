<?php
// Pour les headers et footers il vaut mieux un require_once pour ne pas recharger la requête à chaque fois. Le require_once garde la requête en mémoire => si on utilise plusieurs fois cette requête il vaut mieux la garder en mémoire pour ne la charger qu'une fois.
require_once("header2.php");
require_once("./config/connexion.php");


// On définit la variable $idResa en récupérant le ? idResa = de la boucle foreach résultatPlat.php
$idResa = $_GET['idResa'];


// On sélectionne le plat à modifier :
$requete = $bdd->prepare('SELECT * FROM reservation WHERE id = :id_resa'); // :id_plats est inventé ici, il doit crspdre au 1er paramètre de bindParam
$requete->bindParam(':id_resa', $idResa);
$requete->execute();


// On exécute la requête
while ($donnees = $requete->fetch())
{
  // formulaire permettant de modifier un plat
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

require_once ("footer.php");
?>
