<?php require_once ("header.php");

$message=$_GET['message'];
if ($message == "erreur"){
  echo "<div class='false'>'Le mot de passe est invalide !'</div>";
}

?>
<div class="texte">
       <!-- On prévient le serveur qu'on va envoyer des infos -->
    <form action="admin.php" method="post">
        E-mail :   <input type="email" name="email"><br>
        Mot de passe : <input type="password" name="mdp"><br>
        <input type="submit" value="Se connecter" class="button">
    </form>
  </div>
<?php require_once ("footer.php"); ?>
