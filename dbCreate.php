<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "root";

/*
    $db_host = "mysql-lezooarcadia.alwaysdata.net";
    $db_name = "lezooarcadia_import_local";
    $db_user = "360105";
    $db_password = "PAS12345azerty";
*/
    try {
    $mysqli = new mysqli($db_host,$db_user, $db_password);

    //vérifier la connexion
    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    // Requête SQL pour créer la db
    $create_db_query = "CREATE DATABASE IF NOT EXISTS db_arcadiaZoo";

    // Exécuter la requête SQL
    if ($mysqli->query($create_db_query) === TRUE) {
        echo "La base de données 'db_arcadiaZoo' a été créée avec succès.";
    } else {
        echo "Erreur lors de la création de la base de données : " . $mysqli->error;
    }

    // Fermer la connexion
    $mysqli->close();
} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage();
}
?>