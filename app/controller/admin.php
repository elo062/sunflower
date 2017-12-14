<?php
session_start();
// On se connecte à la bdd
require_once("header.php");
require_once("./config/connexion.php");
$email = $_POST['email'];
$password = sha1($_POST['mdp']);

// On récupère toutes les infos de la table user
$req = $bdd->prepare('SELECT id, password, prenom, nom FROM user WHERE email= :email');
$req->execute(array('email'=>$email));
$result = $req->fetch(PDO::FETCH_ASSOC);
$hash = $result['password']; // Password chiffré en base

// On vérifie qu'il s'agit des bonnes données
if($password == $hash){
  $_SESSION['client'] = true ;
  $_SESSION['id'] = $result['id'];
  $_SESSION['email'] = $email;
  $_SESSION['nom'] = $result['nom'];

// On prévient le visiteur qu'il est bien connecté
  echo  "<div class='texte'>Bienvenue " . htmlspecialchars($result['prenom']) . " !<br /></div>";
  // On lui donne la possibilité de réserver une nouvelle date
  echo "<div class='reservations'><div class='button'><a href='../view/old/enregistrement.php'>Réserver</a></div></div><br />";
  // Ou bien de consulter ses réservations
  echo "<div class='reservations'><div class='button'><a href='finResa.php'>Mes réservations</a></div></div>";
} else {
  // Si le mot de passe est invalide on le redirige vers la page de connexion
  echo "<div class='texte'><div class='false'>Le mot de passe est invalide !</div></div><br />";
  header('Location:login.php?message=erreur');
}
require_once("footer.php");
