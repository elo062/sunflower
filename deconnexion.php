<?php
 session_start();
require_once ("header2.php");

echo "<div class='texte'>Vous êtes maintenant déconnecté(e).</div>";
echo "<div class='reservations'><div class='button'><a href='login.php'>Se connecter</a></div></div>";

require_once ("footer.php");
session_destroy();
?>
