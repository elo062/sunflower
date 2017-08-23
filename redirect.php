<?php
session_start();
$nvPseudo = $_POST['pseudo'];
$_SESSION['pseudo'] = $nvPseudo;
$nvmdp = $_POST['mdp'];
$_SESSION['mdp'] = $nvmdp;
header("Location: index.php");

require_once ("header.php");
?>
<body>
  <div class="content">
    <div class="middle inline">
      <?php sleep(2); echo "Bienvenue " . isset($pseudo) . " !"; ?>
    </div>
  </div>
</body>
<?php require_once ("footer.php"); ?>
