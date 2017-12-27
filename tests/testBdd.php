<?php
/**
 * Created by PhpStorm.
 * User: gruikette
 * Date: 22/12/2017
 * Time: 10:41
 */
include("../app/model/bdd/bdd.class.php");
include("../app/model/bdd/reservationBdd.class.php");
include("../app/model/reservation.class.php");
include("../app/model/utilisateur.class.php");


$reservation = new Reservation('2017-12-09', "Narbonne", 11100,"blabla", new Utilisateur(1));

$reservationBdd = new ReservationBdd();

echo $reservationBdd->add($reservation);


