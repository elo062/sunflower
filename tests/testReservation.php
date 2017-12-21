<?php
/**
 * Created by PhpStorm.
 * User: Eloïse
 * Date: 21/12/2017
 * Time: 15:54
 */
include("../app/model/bdd/reservation.php");
$tabDonnees = array(
    "date_reservation" => '2017-12-09',
    "ville" => "Narbonne",
    "code_postal" => 11100,
    "description" => "blabla",
    "id_utilisateur" => 1,
    "publie" => 1

);



//echo $tabDonnees["id_utilisateur"];

create($tabDonnees);

