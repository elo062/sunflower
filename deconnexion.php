<?php
 session_start();
require_once ("header2.php");

echo "<div class='texte'>Vous êtes maintenant déconnecté(e).</div>";

require_once ("footer.php");
session_destroy();
?>
