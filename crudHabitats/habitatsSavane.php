<?php
include_once("../dbconn.php");

// Requête pour récupérer les animaux appartenant à l'habitat "Savane" avec une seule image par animal
$sql = "SELECT h.id_habitat, h.prenom_animal, hi.image
        FROM habitats h
        LEFT JOIN (
            SELECT habitat_id, MIN(id_image) AS id_image
            FROM habitat_image
            GROUP BY habitat_id
        ) AS hi_grouped ON h.id_habitat = hi_grouped.habitat_id
        LEFT JOIN habitat_image hi ON hi_grouped.id_image = hi.id_image
        WHERE h.habitat = 'Savane'";

$query = $conn->prepare($sql);
$query->execute();
$habitats = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitats Savane</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleHabitatsSavane.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <?php include_once "../pagesFront/header.php"; // Inclusion du header ?>
    </header>

    <div class="container-fluid p-0">
        <div class="jumbotron bg-cover text-white mb-0" style="background-image: url(../img/bg_savane1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center; height: 30vh; position: relative;">
            <div class="container py-5" style="position: absolute; bottom: 0; left: 50px; background-color: rgba(11, 149, 244, 0.6); padding: 15px;">
                <h1 class="display-4 font-weight-bold">Habitats Savane</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <?php foreach ($habitats as $habitat): ?>
            <div class="col-md-4">
                <div class="card border-0 rounded-0 shadow card-custom">
                    <?php if (!empty($habitat['image'])): ?>
                        <img class="card-img-top rounded-0" src="data:image/jpeg;base64,<?php echo base64_encode($habitat['image']); ?>" alt="Image de l'habitat">
                    <?php else: ?>
                        <p>Image non disponible</p>
                    <?php endif; ?>
                    <div class="card-body mt-3 mb-3">
                        <h4 class="card-title"><?php echo htmlspecialchars($habitat['prenom_animal']); ?></h4>
                        <div class="btn-group">
                            <a href="pageDetailHabitats.php?id=<?php echo $habitat['id_habitat']; ?>" class="btn btn-sm btn-outline-secondary">Voir Détail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "../pagesFront/footer.php"; ?> 
</body>
</html>
