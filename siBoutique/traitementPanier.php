<?php
// Pour les headers et footers il vaut mieux un require_once pour ne pas recharger la requête à chaque fois. Le require_once garde la requête en mémoire => si on utilise plusieurs fois cette requête il vaut mieux la garder en mémoire pour ne la charger qu'une fois.
// require_once("header.php");
require_once("./config/connexion.php");


// On définit la variable $idAlbum en récupérant le ? idAlbum = de la boucle foreach boutique.php
$idAlbum = $_GET['idAlbum'];

// On ajoute une entrée dans la table menus
$req = $bdd->prepare('INSERT INTO commandes(id) VALUES(:id)');
$req->execute(array(
	'nom' => $nom,
	'prix' => $prix,
  'image' => $image
	));

header('Location:panier.php');
