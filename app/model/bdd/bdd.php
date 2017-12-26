<?php

function getConnection() {
    $dsn = 'mysql:host=localhost;dbname=sunflower';
    $user = 'root';
    $password = 'root';

    try {
        $bdd = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $bdd;
}

?>
