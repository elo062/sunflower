<?php
 session_start();
require_once("header.php");

if (empty($_SESSION['id']))
// si le visiteur n'est pas connecté on lui propose de s'inscrire ou de se connecter
{
?>
<div class="texte">
    <form action="../../controller/traitementCreerCompte.php" method="post" enctype="multipart/form-data">
      <h1>Créer un compte</h1>
        <p>Vous en avez déjà un ?</p>
        <p><i class="fa fa-arrow-down" aria-hidden="true"></i></p>
        <p class="connection"><a href="login.php">Connectez-vous</a></p>
          <div class="formulaire">
            <p><label for="nom"><strong>Nom :<strong></label>
               <input type="text" name="nom" maxlength="40" id="nom" class="champ" required/>
             </p>
             <p><label for="prenom"><strong>Prénom :<strong></label>
               <input type="text" name="prenom" maxlength="40" id="prenom" class="champ" required/>
            </p>
              <p><label for="adresse"><strong>Adresse :<strong></label>
                <input type="text" name="adresse" maxlength="255" id="adresse" class="champ" required/>
              </p>
            <p><label for="tel"><strong>Téléphone :<strong></label>
                <input type="tel" name="tel" maxlength="10" id="tel" class="champ" required/>
            </p>
            <p><label for="email"><strong>Adresse mail :<strong></label>
               <input type="email" name="email" maxlength="40" id="email" class="champ" required/>
            </p>
             <p><label for="password"><strong>Mot de passe :<strong></label>
               <input type="password" name="password" id="password" maxlength="14" class="champ" required/></p>

             <p><label for="password"><strong>Vérification du mot de passe :<strong></label>
               <input type="password" name="password" maxlength="14" id="vpassword" class="champ" required/></p>
          </div>
          <div id="erreur">
            <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
          </div>
          <p><input type="submit" name="envoyer" value="Envoyer" class="button" id="envoi"></p>
      </form>
  </div>
  <?php
  }else{
    // Si le visiteur est connecté on l'autorise à réserver :
    echo "<div class='texte'><a href='deconnexion.php'><input type='submit' value='Se déconnecter' class='button'></a></div>";
    ?>
    <div class='reservations'>
      <form action="../../controller/traitementResa.php" method="post" enctype="multipart/form-data">
        <!-- On récupère l'id_user pour la page traitementResa.php -->
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" />
          <?php
          // On récupère le message d'erreur de la page traitementResa.php si la date est déjà réservée
          if($_GET['message']=='erreurDate'){
            echo "<div class='false'>La date choisie est déjà prise, merci d'en choisir une autre.</div></br>";
          };
          ?>
          <p><label for="date">Date de l'événement : </label><input type="date" name="dateResa"  placeholder="jj/mm/aaaa" class="champ" required/></p>
          <p><label for="duree">Durée de l'animation :</label><input type="number" name="duree" placeholder="en heures" class="champ" required/></p>
          <p><label for="lieu">Lieu de l'animation :</label><input type="text" name="lieu" class="champ" required/></p>
          <p><label for="message">Remarques :</label><textarea name="message" cols="40" rows="4" maxlength="250" placeholder="250 caractères max."/></textarea></p>
          <!--Envoyer la résa-->
          <p><input type="submit" value="Envoyer" class="button" /></p>
        </form>
      </div>
    <?php
  }
  ?>

<?php require_once("footer.php"); ?>
