<?php
session_start();
  if (empty($_SESSION['id'])) //les membres connecte ne peuvent pas s'inscrire
    {
      /* il faut que toutes les variables du formulaires existent*/
      if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['password']))
      {
        /*il faut que tous les champs soient renseignes*/
        if($_POST['nom']!="" && $_POST['prenom']!="" && $_POST['adresse']!="" && $_POST['tel']!="" && $_POST['email']!="" && $_POST['password']!="")
        {

      // On se connecte à la bdd
      require_once("./config/connexion.php");
      /* on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur*/
         if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$#", $_POST['email']))
         {
          //  /*on verifie si un membre ne possede pas deja le meme pseudo*/
          //     $req = $bdd->prepare('SELECT membre_id FROM membres WHERE membre_pseudo = :membre_pseudo');
          //     $req->execute(array('membre_pseudo'=> $_POST['membre_pseudo']));
          //     $nb_resultats_recherche_membre=$req->fetch();
          //
          //     if(!$nb_resultats_recherche_membre) /*si il n'y a pas de resultat*/
          //     {
              $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
              $adresse = $_POST['adresse'];
              $tel = $_POST['tel'];
              $email = $_POST['email'];
              /*on crypte le mot de passe*/
              $mdp = sha1($_POST['password']);

              /*Si le pseudo est libre et l'email valide, alors on enregistre le nouveau membre*/
              $req=$bdd->prepare('INSERT INTO user(nom, prenom, adresse, tel, email, password) VALUES(:nom, :prenom, :adresse, :tel, :email, :password)');
              $req->execute(array(
                'nom' => $nom,
                'prenom'=>$prenom,
                'adresse'=>$adresse,
                'tel'=>$tel,
                'email'=>$email,
                'password'=>$mdp
              ));

              echo "Merci de votre inscription";
              }
            else
            {
            echo "Votre adresse email n'est pas valide";
            }
          }
          else
          {
          echo "Il faut remplir tous les champs";
          }
         }
      else
      {
      echo "Une erreur s'est produite";
      }
     }
   else
   {
   echo "Vous êtes déjà inscrit et connecté";
   }

  // Redirection
header('Location:resa.php');
?>
