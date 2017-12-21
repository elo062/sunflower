 -- 3. Insérer un nouveau prospect en saisissant un mail, mdp, nom, prénom, adresse postal, téléphone, code postal, newsletter et ville
-- insère un utilisateur
INSERT INTO utilisateur (email, mdp, droit, nom, prenom, adresse_postale, code_postal, ville, telephone, newsletter)
    VALUES('prospec10@gmail.com','123456', 0, 'nom10', 'prenom10', 'adresse_postale' , 11590, 'ville10', 0665252525, 1);



-- inserrer une réservation
INSERT INTO `reservation` (`id`, `date_reservation`, `ville`, `description`, `valide`, `publie`, `photo_couverture`, `code_postal`, `id_utilisateur`) VALUES (NULL, '2018-02-09', 'Narbonne', 'blabla.', 0, 0, 'test.jpg', 11100, 3);

-- 1. Faire une requête qui affiche le mdp, id et adresse mail de l'utilisateur qui a une adresse mail "prospect1@gmail.com";
    SELECT u.id, u.mdp, u.email
FROM utilisateur AS u
WHERE u.email = 'prospect1@gmail.com';

-- 2.  Faire une requête qui regarde si "prospect1@gmail.com" existe dans la table utilisateur.

SELECT email FROM `utilisateur` WHERE `email` = 'prospect1@gmail.com';


-- 4. Modifier le nom, le prénom de l'utilisateur qui a l'id 2.
UPDATE `utilisateur` SET `nom` = 'Modif2Toto2', `prenom` = 'Modif2Tutu2' WHERE `id` = 2;

-- 5. Supprimer un prospect selon son id 3
DELETE FROM reservation
WHERE reservation.id_utilisateur = 3;

DELETE FROM utilisateur
WHERE id = 3;


--     6.Afficher toutes les informations des réservations avec le nom et prénom de l'utilisateur
--  On cherche des id utilisateurs qui sont dans la table utilisateur : c'est le cas où l'utilsateur a obligatoirement fait une résa
 SELECT r.*, u.nom, u.prenom
 FROM reservation AS r
     INNER JOIN utilisateur u ON r.id_utilisateur = u.id ;
-- équivaut à WHERE r.id_utilisateur = u.id ;

--  Afficher les utilisateurs qui ont ou non des réservations + afficher la date des résa
 SELECT u.*, r.date_reservation
 FROM utilisateur u LEFT JOIN reservation r
ON u.id = r.id_utilisateur
 WHERE u.droit = 0;

-- 7.  Afficher les informations d'une réservation (date, ville, code_postal, valide) du prospect qui a l'id 1
SELECT r.date_reservation, r.ville, r.code_postal, r.valide
FROM reservation AS r
WHERE r.id_prospect = 1;

 -- 8.  Afficher les informations d'une réservation (date, ville, code_postal, valide) de l'utilisateur qui a l'adresse mail prospect2@gmail.com
 SELECT r.date_reservation, r.ville, r.code_postal, r.valide
 FROM reservation AS r INNER JOIN utilisateur AS u
 ON r.id_utilisateur = u.id
 WHERE u.email = 'prospect2@gmail.com';


 -- 9.  Ajouter une réservation (date, ville, code_postal, description) pour le prospect qui a l'id 1
 INSERT INTO reservation (date_reservation, ville, code_postal, description, id_utilisateur)
 VALUES('2017-12-09','Narbonne', 11100, 'blabla', 1);


 -- 10.  Ajouter une réservation (date, ville, code_postal, description, valide, photo_couverture -> nom image)  pour le prospect qui l'id 1
 INSERT INTO reservation (date_reservation, ville, code_postal, description, valide, id_utilisateur)
 VALUES('2017-12-09','Narbonne', 11100, 'blabla', 1, 1);

 -- 11. Modifier la réservation qui l'id récupéreé en changeant publie à 1
 UPDATE reservation SET publie = 1
 WHERE id = 2;


 -- 12. Supprimer une réservation (choisir l'id)
 DELETE FROM reservation
 WHERE id = 2;
