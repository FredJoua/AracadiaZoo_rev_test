<?php
// Informations pour se connecter à la base de données
$db_host = "localhost";
$db_name = "db_arcadiazoo";
$db_user = "root";
$db_password = "root";

    try{
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '';
    }  
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }
?>
