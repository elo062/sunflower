<!-- Page de résultat une fois son profil enregistré -->
<!-- Début de la session start -->
<?php session_start();
// On se connecte à la bdd
require_once("./config/connexion.php");
$req = $bdd->prepare('SELECT password FROM user WHERE username= :username');
$req->execute(array('username'=>$username));
$result = $req->fetch(PDO::FETCH_ASSOC);

$hash = $result['password']; // Password chiffré en base
$password = $_REQUEST['password']; // Password en clair saisi par l'utilisateur sur la page de login
$username = $_POST['username'];

//
if(password_verify($password, $hash)){
    echo 'Le mot de passe est valide !';
} else{
    echo 'Le mot de passe est invalide !';
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mdp = $_POST['password'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];


            try
            {

            // Insertion des données à l'aide d'une requête préparée
            $req = $bdd->prepare('INSERT INTO user (username, nom, prenom, tel, adresse, email, password) VALUES(:username, :nom, :prenom, :tel, :adresse, :email, :password)');
            $req->execute(array(
              'username' => $username,
              'nom' => $nom,
              'prenom' => $prenom,
              'tel' => $tel,
              'adresse' => $adresse,
              'email' => $email,
              $mdp));

            $nom = htmlspecialchars($_POST['username']);
            }
            catch(Exception $e)
            {
                    echo "Vous êtes déjà inscrit.";
                    $req = $bdd->prepare('SELECT username FROM user WHERE username= :username');
                    $req->execute(array('username'=>$username));
                    $result = $req->fetch(PDO::FETCH_ASSOC);
                    if($result['username']){
                        echo "Le pseudo que vous avez choisi est déjà pris. <b>" . $result['username']."</b> <br />";
                    }
            }

            // Redirection
            // header('Location:resa.php');
