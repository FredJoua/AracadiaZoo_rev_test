<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db Habitat Images</title>
</head>

<body>
    <?php

    // Informations pour se connecter à la base de données
    $db_host = "localhost";
    $db_name = "db_arcadiaZoo";
    $db_user = "root";
    $db_password = "root";
    try {
        // Créer la connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Définir le jeu de caractères 
        $conn->exec("SET NAMES 'utf8'");
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher un message d'erreur détaillé
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Vérifier si HabitatsBis existe et vérifier sa structure
    try {
        $createHabitatTable = "CREATE TABLE IF NOT EXISTS HabitatsBis (
            id_habitat INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB;";

        $conn->exec($createHabitatTable);
        echo "Table HabitatsBis vérifiée ou créée avec succès.<br>";
    } catch (PDOException $e) {
        die("Erreur lors de la vérification/création de la table HabitatsBis : " . $e->getMessage());
    }

    try {
        $createTable = "CREATE TABLE habitat_imagebis (
            id_image INT AUTO_INCREMENT PRIMARY KEY,
            habitat_id INT NOT NULL,
            image LONGBLOB NOT NULL,
            FOREIGN KEY (habitat_id) REFERENCES HabitatsBis(id_habitat) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB;";

        $conn->exec($createTable);
        echo "La table image a été créée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la table image : " . $e->getMessage();
    }

    $conn = null;
    ?>
</body>

</html>
