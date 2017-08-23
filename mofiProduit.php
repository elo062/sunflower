<?php
// Pour les headers et footers il vaut mieux un require_once pour ne pas recharger la requête à chaque fois. Le require_once garde la requête en mémoire => si on utilise plusieurs fois cette requête il vaut mieux la garder en mémoire pour ne la charger qu'une fois.
require_once("header.php");
require_once("./config/connexion.php");


// On définit la variable $idAlbum en récupérant le ? idAlbum = de la boucle foreach boutique.php
$idAlbum = $_GET['idAlbum'];


// On sélectionne l'album à modifier :
$requete = $bdd->prepare('SELECT * FROM boutique WHERE id = :id'); // :id est inventé ici, il doit crspdre au 1er paramètre de bindParam
$requete->bindParam(':id', $idAlbum);
$requete->execute();


// On exécute la requête
while ($donnees = $requete->fetch())
{
  // formulaire permettant de modifier un album
  echo "<div class='album'>
    <form method='post' action='traitementModifProduit.php?idAlbum=".$idAlbum."' enctype='multipart/form-data'>
      <p>
        <label for='nom'>Modifiez le nom de votre album :</label>
        <input type='text' name='nom' id='nom' placeholder='Ex : Compilation jazz' size='30' maxlength='30' value='" . $donnees['nom'] . "'/>
        <br />
        <label for='prix'>Modifiez son prix en euros :</label>
        <input type='text' name='prix' id='prix' placeholder='Ex : 15.99' size='30' maxlength='5' value='" . $donnees['prix'] . "'/>
        <br />
        <label for='image'>Changez la photo (max 1Mo) :</label>
        <input type='hidden' name='MAX_FILE_SIZE' value='1048576' />
        <input type='file' name='image' value='' id='image'>
      </p>
      <input type='submit' name='envoyer' value='Envoyer' class='button'>
    </form>
  </div>";
}

require_once ("footer.php");
?>
