<?php
session_start();
// On se connecte à la bdd
require_once("./config/connexion.php");
$email = $_POST['email'];
$password = sha1($_POST['mdp']);

$req = $bdd->prepare('SELECT id, password, prenom, nom FROM user WHERE email= :email');
$req->execute(array('email'=>$email));
$result = $req->fetch(PDO::FETCH_ASSOC);
$hash = $result['password']; // Password chiffré en base

// Vérification du mot de passe saisi et mot de passe en base
if($password == $hash){
  $_SESSION['client'] = true ;
  $_SESSION['id'] = $result['id'];
  $_SESSION['email'] = $email;
  $_SESSION['nom'] = $result['nom'];

  echo  'Bienvenue ' . htmlspecialchars($result['prenom']) . ' !<br />';
  echo '<a href="enregistrement.php">Réserver</a> / <a href="finResa.php">Mes réservations</a>';
} else {
  echo "<div class='texte'><div class='false'>Le mot de passe est invalide !</div></div><br />";
  header('Location:login.php?message=erreur');
}
