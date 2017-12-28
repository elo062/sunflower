<?php
require_once("vendor/autoload.php");
// On définit le chemin pour chercher les templates
$loader = new Twig_Loader_Filesystem("app/view");
$twig = new Twig_Environment($loader, array(
        "cache" => false
 ));


if(isset($_GET['action'])) {
    $action = $_GET['action'];

    if($action == "listReservation") {
        // On demande l'affichage d'index.html.twig et on assigne une variable pour que le template le récupère et l'affiche
        echo $twig->render("reservation/listReservation.html.twig", array(
            "reservations" => ""
        ));
    }
}
else {
    // On demande l'affichage d'index.html.twig et on assigne une variable pour que le template le récupère et l'affiche
    echo $twig->render("index.html.twig", array(
        "chemin_images" => "assets/img/",
        "chemin_css"=> "assets/css/",
        "chemin_js"=> "assets/js/",
        "chemin_vendor"=> "assets/vendor/",
    ));
}