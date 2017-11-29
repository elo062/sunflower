<?php
 session_start();
require_once ("header2.php");

if (empty($_SESSION['id']))
//les membres connectés ne peuvent pas s'inscrirent
{
?>

<!--Nom (type : text) , Email(type : email), Tél ( type : tel )-->
<div class="texte">
    <form action="traitementCreerCompte.php" method="post" enctype="multipart/form-data">
        <h1>Créer un compte</h1>
            <p class="espace">Vous en avez déjà un ? <a href="login.php"> Connectez-vous</a></p>
            <div class="formulaire">
            <p><label for="nom"><strong>Nom :<strong></label>
               <input type="text" name="nom" maxlength="40" />
             </p>
            <p><label for="prenom"><strong>Prénom :<strong></label>
               <input type="text" name="prenom" maxlength="40" id="prenom"/>
             </p>
             <p><label for="adresse"><strong>Adresse :<strong></label>
                <input type="text" name="adresse" maxlength="255"/>
              </p>
             <p><label for="tel"><strong>Téléphone :<strong></label>
                <input type="tel" name="tel" maxlength="10"/>
            </p>
             <p><label for="email"><strong>Adresse mail :<strong></label>
               <input type="email" name="email" maxlength="40"/>
             </p>
            <p><label for="password"><strong>Mot de passe :<strong></label>
               <input type="password" name="password" id="password" maxlength="14"/></p>

            <p><label for="password"><strong>Vérification du mot de passe :<strong></label>
               <input type="password" name="password" maxlength="14" id="vpassword"/></p>
             </div>

            <p><input type="checkbox" name="showpsd" class="showpsd"/><label for="showpsd">Montrer le mot de passe</label></p>

            <p><input type="submit" name="envoyer" value="Envoyer" class="button"></p>

      </form>
  </div>
  <?php
  }else{
    echo "<div class='texte'><a href='deconnexion.php'><input type='submit' value='Se déconnecter' class='button'></a></div>";
    ?>
    <div class='texte'>
    <form action="traitementResa.php" method="post" enctype="multipart/form-data"> <!-- On prévient le serveur qu'on va envoyer des infos -->

              <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" />
              <p><label for="date">Date de l'événement : </label><input type="date" name="dateResa"  placeholder="jj/mm/aaaa"/></p>
              <p><label for="duree">Durée de l'animation :</label><input type="number" name="duree" placeholder="en heures"/></p>
              <p><label for="lieu">Lieu de l'animation :</label><input type="text" name="lieu"></p>
              <p><label for="message">Remarques :</label><textarea name="message" cols="40" rows="4" maxlength="250" placeholder="250 caractères max."></textarea></p>

              <!--Envoyer la résa-->
              <p><input type="submit" value="Envoyer" class="button" /></p>

          </form>
            </div>
      <?php
  }
  ?>

<?php require_once ("footer.php"); ?>
