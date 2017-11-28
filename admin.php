<?php
session_name ('sunflower');
session_start();
// On se connecte à la bdd
require_once("./config/connexion.php");
$email = $_POST['email'];
$password = sha1($_POST['mdp']);

$req = $bdd->prepare('SELECT id, password, prenom FROM user WHERE email= :email');
$req->execute(array('email'=>$email));
$result = $req->fetch(PDO::FETCH_ASSOC);

$hash = $result['password']; // Password chiffré en base

// Vérification du mot de passe saisi et mot de passe en base
if($password == $hash){
  $_SESSION['client'] = true ;
  $_SESSION['id'] = $result['id'];

  echo  'Bienvenue ' . htmlspecialchars($result['prenom']) . ' !<br />';
  echo '<a href="resa.php">Réserver</a> / <a href="finResa.php">Mes réservations</a>';
} else {
  echo "<div class='false'>Le mot de passe est invalide !</div><br />";
  header('Location:login.php?message=erreur');
}
