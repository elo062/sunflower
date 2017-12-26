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

function create($tabDonnees)
{

    $dsn = 'mysql:host=localhost;dbname=sunflower';
    $user = 'root';
    $password = 'root';

    try {
        $bdd = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

//    On récupère tous les index du tableau $tabDonnees dans une chaîne pour éviter de créer une variable pour chaque colonne et de tester les champs non obligatoires un par un.(ex : le prospect ne va pas inserrer une photo de l'évènement).

 /*   Ex :

  $lstColonne = " date_reservation,
                        ville,
                        code_postal,
                        description,

                        id_utilisateur";

    if (isset) vérifie si une variable est définie et n'est pas nulle

    if (isset($tabDonnees["publie"])) {
        $lstColonne = $lstColonne.", publie";
    }
    if (isset($tabDonnees["valide"])) {
        $lstColonne = $lstColonne.", valide";
    }
    if (isset($tabDonnees["photo_couverture"])) {
        $lstColonne = $lstColonne.", photo_couverture";
    }*/

//La fonction array_keys permet de récupérer tous les index du tableau $tabDonnees et de recréer un tableau $tabParameters à partir de ces index. (c'est comme si on parcourait le tableau pourrécupérer les index pour le rajouter dans un nouveau tableau).
    $tabParameters = array_keys($tabDonnees);
    //La fonction implode permet de transformer ce nouveau tableau en chaîne de caractères.
    $lstColonnes = implode(",", $tabParameters);
    $lstParameters = ":" . implode(", :", $tabParameters);

//    On prépare la requête pour la sécuriser
    $stmt = $bdd->prepare(
        "INSERT INTO reservation (
                       $lstColonnes
                    ) VALUES (
                         $lstParameters
                      )");

//    $key = la clé = l'index du tableau à laquelle on assigne une valeur ($value)

    foreach ($tabDonnees as $key => $value){

         $stmt->bindParam($key, $value);

    }

//    $stmt->bindParam(':date_reservation', $tabDonnees['date_reservation']);
//    $stmt->bindParam(':ville', $tabDonnees['ville']);
//    $stmt->bindParam(':code_postal', $tabDonnees['code_postal']);
//    $stmt->bindParam(':description', $tabDonnees['description']);
//    if (isset($tabDonnees['valide'])) {
//        $stmt->bindParam(':valide', $tabDonnees['valide']);
//    }
//    if (isset($tabDonnees['publie'])) {
//        $stmt->bindParam(':publie', $tabDonnees['publie']);
//    }
//    if (isset($tabDonnees['photo_couverture'])) {
//        $stmt->bindParam(':photo_couverture', $tabDonnees['photo_couverture']);
//    }
//
//    $stmt->bindParam(':id_utilisateur', $tabDonnees['id_utilisateur']);
////  On exécute la requête
    $stmt->execute();

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