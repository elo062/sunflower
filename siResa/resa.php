<?php require_once ("header2.php"); ?>

<div class="texte">

<<?php
echo "<p class='texte'>Bienvenue " . $user['prenom'] . " " . $user['nom'] . " </p>";
 ?>

  <form action="traitementResa.php" method="post" enctype="multipart/form-data"> <!-- On prévient le serveur qu'on va envoyer des infos -->

            <p><label for="date">Date de l'événement : </label><input type="date" name="eventDate"/></p>
            <p><label for="duree">Durée de l'animation :</label><input type="number" name="eventLength" placeholder="exprimé en nombre d'heures. ex : 3"/></p>
            <p><label for="lieu">Lieu de l'animation :</label><input type="text" name="lieu"></p>
            <p><label for="message">Remarques :</label><textarea name="message" cols="40" rows="4" maxlength="250" placeholder="250 caractères max."></textarea></p>

            <!--Envoyer la résa-->
            <p><input type="submit" value="Envoyer" /></p>

        </form>

</div>


<?php require_once ("footer.php"); ?>
