<?php
/* Function creer;

exemple :

-- 9.  Ajouter une réservation (date, ville, code_postal, description) pour le prospect qui a l'id 1

$tabDonnees = array(
"date_reservation" => '2017-12-09',
"ville" => "Narbonne",
"code_postal" => 11100,
"description" => "blabla",
"id_utilisateur" => 1

);

create($tabDonnees);

==> testReservation.php

dans la fonction create de reservation.php :

 INSERT INTO reservation (date_reservation, ville, code_postal, description, id_utilisateur)
 VALUES($tabDonnees["date_reservation"],'Narbonne', 11100, 'blabla', 1);


 -- 10.  Ajouter une réservation (date, ville, code_postal, description, valide, photo_couverture -> nom image)  pour le prospect qui l'id 1
 INSERT INTO reservation (date_reservation, ville, code_postal, description, valide, id_utilisateur)
 VALUES('2017-12-09','Narbonne', 11100, 'blabla', 1, 1);*/

// On créé la fonction pour ajouter/créer une réservation
function create($tabDonnees)
{
    $bdd = getConnection();
    $fields = "date_reservation, ville, code_postal, description, id_utilisateur";

// On teste si publie a été rempli et si oui on l'ajoute dans les champs à insérer
    if (isset($tabDonnees['publie'])) {
        $fields .= ', publie';
        // équivalent : $fields = $fields . ', publie';
    }
    if (isset($tabDonnees['valide'])) {
        $fields .= ' , valide';
    }
    if (isset($tabDonnees['photo_couverture'])) {
        $fields .= ' , photo_couverture';
    }

    // on prend les mêmes champs que pour fields et on ajoute ":" avant chaque champ pour éviter de répéter le code
    $params = ':' .str_replace(', ',', :', $fields);

// $requete contient la chaîne de la requête à préparer
    $requete = "INSERT INTO reservation ($fields)
 VALUES($params)";
// On prépare la requête
    // On est obligé d'utiliser une variable prepare pour utiliser bindParam (qui remplace les :champs par la valeur du tableau passée en paramètre)
    $prepare = $bdd ->prepare($requete);
     bindParamReservation($prepare, $tabDonnees);

    // On exécute la requête)
    $prepare->execute();
}

// On créé la fonction pour modifier une réservation
function update($tabDonnees){
    $bdd = getConnection();
    $requete = "UPDATE reservation SET date_reservation = :date_reservation, ville = :ville, code_postal = :code_postal, description = :description, id_utilisateur = :id_utilisateur";
    if(isset($tabDonnees['publie'])){
        $requete = $requete . ', publie = :publie';
    }
    if(isset($tabDonnees['valide'])){
        $requete = $requete . ', valide = :valide';
    }
    if(isset($tabDonnees['photo_couverture'])){
        $requete = $requete . ', photo_couverture = :photo_couverture';
    }

    $requete = $requete . " WHERE id = :id";
    $prepare = $bdd->prepare($requete);
    // A l'appel de la fonction on n'a pas à créer une variable pour récupérer la valeur (voir explication en-dessous)
    bindParamReservation($prepare, $tabDonnees);
    $prepare->execute();
}
// En mettant un paramètre par référence (= "&" devant le paramètre) on n'a pas à mettre de return à la fin de la fonction et à l'appel de la fonction on n'a pas à créer une variable pour récupérer la valeur => sa portée est équivalente à celle d'une variable globale = qd on a besoin d'un paramètre, qu'on le modifie et qu'on a besoin de le retourner
function bindParamReservation(&$prepare, $tabDonnees){

    $prepare->bindParam(':date_reservation', $tabDonnees['date_reservation']);
    $prepare->bindParam(':ville', $tabDonnees['ville'], PDO::PARAM_STR );
    $prepare->bindParam(':code_postal', $tabDonnees['code_postal'], PDO::PARAM_INT);
    $prepare->bindParam(':description', $tabDonnees['description'], PDO::PARAM_STR);
    $prepare->bindParam(':id_utilisateur', $tabDonnees['id_utilisateur'], PDO::PARAM_INT);
    if(isset($tabDonnees['id'])){
        $prepare->bindParam(':id', $tabDonnees['id'], PDO::PARAM_INT);
    }

    // On remplace la variable uniquement si on la remplit dans le tableau (sinon erreur)
    if(isset($tabDonnees['publie'])){
        $prepare->bindParam(':publie', $tabDonnees['publie'], PDO::PARAM_BOOL);
    }
    if(isset($tabDonnees['valide'])){
        $prepare->bindParam(':valide', $tabDonnees['valide'], PDO::PARAM_BOOL);
    }
    if(isset($tabDonnees['photo_couverture'])){
        $prepare->bindParam(':photo_couverture', $tabDonnees['photo_couverture'], PDO::PARAM_STR);
    }
}

// On crée les fonctions qui affichent les réservations par id de réservation, d'utilisateur, et toutes les réservations

function findAll()
{
    $bdd = getConnection();
    $requete = "SELECT * FROM reservation";
    // On a besoin de PDO::FETCH_ASSOC pour obtenir dans chaque ligne de résultat le nom des colonnes (ville, description, etc) => tableau à double dimension
    $reservations = $bdd->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    return $reservations;
}

function findAllDate() {
    $bdd = getConnection();
    // L'instruction DISTINCT permet de supprimer les doublons dans le SELECT : ça permet d'afficher une seule fois une donnée qui se répète dans une table
    $requete = "SELECT DISTINCT date_reservation FROM reservation";
    // On a besoin de PDO::FETCH_COLUMN pour obtenir juste les dates (pas besoin de double dimension)
    $reservations = $bdd->query($requete)->fetchAll(PDO::FETCH_COLUMN);
    return $reservations;
}

// On renvoit un et un seul enregistrement dans un tableau car l'id est unique
function findById($id){
    $bdd = getConnection();
    $requete = "SELECT * FROM reservation WHERE id = :id";
    $prepare = $bdd->prepare($requete);
    $prepare->bindParam(':id', $id);
    $prepare->execute();
  $uneResa=  $prepare->fetch(PDO::FETCH_ASSOC);
    return $uneResa;
}


// On cherche toutes les résa d'un utilisateur
function findByIdUtilisateur($id_utilisateur){
    $bdd = getConnection();
    $requete = "SELECT * FROM reservation WHERE id_utilisateur = :id_utilisateur";
    $prepare = $bdd->prepare($requete);
    $prepare->bindParam(':id_utilisateur', $id_utilisateur);
    $prepare->execute();
    $desResa = $prepare->fetchAll(PDO::FETCH_ASSOC);
    return $desResa;
}

/* Function modifier;
 -- 11. Modifier la réservation qui l'id récupéreé en changeant publie à 1
 UPDATE reservation SET publie = 1
 WHERE id = 2;

supprimer;

 -- 12. Supprimer une réservation (choisir l'id)
 DELETE FROM reservation
 WHERE id = 2;

function getAll

--     6.Afficher toutes les informations des réservations avec le nom et prénom de l'utilisateur
--  On cherche des id utilisateurs qui sont dans la table utilisateur : c'est le cas où l'utilsateur a obligatoirement fait une résa
 SELECT r.*, u.nom, u.prenom
 FROM reservation AS r
     INNER JOIN utilisateur u ON r.id_utilisateur = u.id ;
function getAllByProspect
-- 7.  Afficher les informations d'une réservation (date, ville, code_postal, valide) du prospect qui a l'id 1
SELECT r.date_reservation, r.ville, r.code_postal, r.valide
FROM reservation AS r
WHERE r.id_prospect = 1;

 -- 8.  Afficher les informations d'une réservation (date, ville, code_postal, valide) de l'utilisateur qui a l'adresse mail prospect2@gmail.com
 SELECT r.date_reservation, r.ville, r.code_postal, r.valide
 FROM reservation AS r INNER JOIN utilisateur AS u
 ON r.id_utilisateur = u.id
 WHERE u.email = 'prospect2@gmail.com';

 */