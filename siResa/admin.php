<?php
session_start();
// On se connecte à la bdd
require_once("./config/connexion.php");
$email = $_POST['email'];
$password = $_POST['mdp'];

//echo $password;

$_SESSION['admin'] = true ;
$_SESSION['email'] = $email;


            $req = $bdd->prepare('SELECT password FROM users WHERE email= :email');
            $req->execute(array('email'=>$email));
            $result = $req->fetch(PDO::FETCH_ASSOC);

            $hash = $result['password']; // Password chiffré en base

            // Vérification du mot de passe saisi et mot de passe en base
            if(password_verify($password, $hash)){
              echo  'Bienvenue ' . htmlspecialchars($_POST['username']) . '<br />';
              echo '<a href="resa.php">Réserver</a>';
            } else{
                echo 'Le mot de passe est invalide !';
            }
