<?php
 session_start();
if (empty($_SESSION['id']))
//les membres connecte ne peuvent pas s'inscrire
{
?>
<!-- formulaire permettant de s'enregistrer -->
<?php require_once ("header.php"); ?>

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
  echo "Vous êtes déjà inscrit et connecté";
  }
  ?>

<?php require_once ("footer.php"); ?>
