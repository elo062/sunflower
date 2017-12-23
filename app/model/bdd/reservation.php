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
    $password = '';

    try {
        $bdd = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }


    // on créé une variable contenant la liste des champs obligatoires
  $fields = "date_reservation,ville,code_postal,description,id_utilisateur";

//    if (isset) vérifie si une variable est définie et n'est pas nulle

    if (isset($tabDonnees["publie"])) {
        $fields = $fields.",publie";
    }
    if (isset($tabDonnees["valide"])) {
        $fields = $fields.",valide";
    }
    if (isset($tabDonnees["photo_couverture"])) {
        $fields = $fields.",photo_couverture";
    }

    // on remplace dans la chaine des champs les virgules par ,: pour avoir la liste des paramètres pour la requête préparées
    $parameters = ":".str_replace(',', ',:', $fields);



//    On prépare la requête pour la sécuriser
    $stmt = $bdd->prepare(
        "INSERT INTO reservation (
                       $fields
                    ) VALUES (
                        $parameters
                      )");

//    $key = la clé = l'index du tableau à laquelle on assigne une valeur ($value)

    foreach ($tabDonnees as $key => $value){

        // si la valeur est bien saisie
        if(isset($value)) {
            $stmt->bindValue($key, $value);
        }


    }


////  On exécute la requête et retourne true ou false si la requête s'est bien exécutée
    return $stmt->execute();

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