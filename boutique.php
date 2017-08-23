<!-- Page qui affiche tous les albums -->
<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("header.php");
$reponse = $bdd->query('SELECT * FROM boutique ORDER BY boutique.id DESC ');
$albums = $reponse;
 ?>

 <div class="texte">
 <h1>Albums disponibles :</h1>
	</div>


 <?php
 foreach($albumss as $albums)
 {
 				echo "<p class='album'>Album : " . $albums['nom'] . " </p>";
 				echo "<p class='album'>Prix : " . $albums['prix'] . " € </p>";
				echo "<p class='album'><Image : " . $albums['image'] . " </p>";
				echo "<p class='album'><img src='./assets/img/" . $albums['image'] . "' </p><br />";
        echo "<a href='updatePlat.php?idAlbum=" . $albums['ID'] . "'><input type='submit' value='Modifier' class='button' name='idAlbum'></a>";
 				echo "<a href='supprimerPlat.php?idAlbum=" . $albums['ID'] . "'><input type='submit' value='Supprimer' class='button' name='idAlbum'></a><br /><br />";
 }

require_once("footer.php");
?>
