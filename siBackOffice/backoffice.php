<!-- Page qui affiche tous les albums -->
<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("header2.php");
$reponse = $bdd->query('SELECT * FROM boutique ORDER BY boutique.id DESC ');
$albums = $reponse;
 ?>

 <div class="texte">
   <p><a href="addProduit.php">Ajouter un album</a></p>
 <h1>Albums disponibles :</h1>
 </div>



 <?php
 foreach($albums as $album)
 {
   echo "<div class='boutique'>";
   echo "<p class='album'>Album : " . $album['nom'] . " </p>";
   echo "<p class='album'>Prix : " . $album['prix'] . " € </p>";
   echo "<p class='album'><Image : " . $album['image'] . " </p>";
   echo "<p class='album'><img src='./assets/img/" . $album['image'] . "' </p><br />";
   echo "<a href='modifProduit.php?idAlbum=" . $album['id'] . "'><input type='submit' value='Modifier' class='button' name='idAlbum'></a>";
   echo "<a href='suppProduit.php?idAlbum=" . $album['id'] . "'><input type='submit' value='Supprimer' class='button' name='idAlbum'></a><br /><br />";
   echo "</div>";
 }

require_once("footer.php");
?>
