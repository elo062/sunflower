<?php require_once ("header2.php"); ?>
<div class="texte">
         <!-- On prévient le serveur qu'on va envoyer des infos -->
      <form action="admin.php" method="post">
          E-mail:   <input type="email" name="email"><br>
          password: <input type="password" name="mdp"><br>
          <input type="submit">
      </form>
<?php require_once ("footer.php"); ?>
