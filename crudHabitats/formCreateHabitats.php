<?php
include_once("../dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données de l'habitat
    $habitat = $_POST['habitat'];
    $description_habitat = $_POST['description_habitat']; 
    $prenom_animal = $_POST['prenom_animal'];
    $race = $_POST['race'];
    $etat_sante = $_POST['etat_sante'];
    $detail_sante = $_POST['detail_sante'];
    $nourriture = $_POST['nourriture'];
    $grammage = $_POST['grammage'];
    $date_visite = $_POST['date_visite'];
    $date_repas_pris = $_POST['date_repas_pris'];
    $heure_repas_pris = $_POST['heure_repas_pris'];

    // Insérer l'habitat sans image
    $sql = "INSERT INTO habitats (habitat, description_habitat, prenom_animal, race, etat_sante, detail_sante, nourriture, grammage, date_visite, date_repas_pris, heure_repas_pris) 
            VALUES (:habitat, :description_habitat, :prenom_animal, :race, :etat_sante, :detail_sante, :nourriture, :grammage, :date_visite, :date_repas_pris, :heure_repas_pris)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':habitat', $habitat);
    $stmt->bindParam(':description_habitat', $description_habitat); 
    $stmt->bindParam(':prenom_animal', $prenom_animal);
    $stmt->bindParam(':race', $race);
    $stmt->bindParam(':etat_sante', $etat_sante);
    $stmt->bindParam(':detail_sante', $detail_sante);
    $stmt->bindParam(':nourriture', $nourriture);
    $stmt->bindParam(':grammage', $grammage, PDO::PARAM_INT);
    $stmt->bindParam(':date_visite', $date_visite);
    $stmt->bindParam(':date_repas_pris', $date_repas_pris);
    $stmt->bindParam(':heure_repas_pris', $heure_repas_pris);
    $stmt->execute();

    // Obtenir l'ID de l'habitat nouvellement créé
    $habitat_id = $conn->lastInsertId();

    // Gérer le téléchargement des images
    foreach ($_FILES['img']['tmp_name'] as $key => $image) {
        if (file_exists($image) && is_uploaded_file($image)) {
            $imageContent = file_get_contents($image);
            $sql = "INSERT INTO habitat_image (habitat_id, image) VALUES (:habitat_id, :image)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
            $stmt->bindParam(':image', $imageContent, PDO::PARAM_LOB);
            $stmt->execute();
        }
    }

    echo "Habitat créé avec succès.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer employés</title>

    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            padding-top: 75px; 
        }
        .mb-5 {
            margin-bottom: 50px; 
        }
    </style>
</head>

<body>
    <?php include_once "../pagesFront/headerLogout.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-3">
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Formulaire Creation D'Habitat</h4>
                    <p></p>
                    <hr>
                </div>

                <form action="formCreateHabitats.php" method="post" enctype="multipart/form-data">
                    <div class="mb mb-3">
                        <input class="form-control" name="habitat" id="habitat" type="text" placeholder="Habitat" required>
                    </div>
                    <div class="mb mb-3">
                        <textarea class="form-control my-3 p-3" name="description_habitat" id="description_habitat" placeholder="Description habitat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="img" name="img[]" multiple required>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input class="form-control" type="text" name="prenom_animal" placeholder="Prénom de l'Animal" required>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control" type="text" name="race" placeholder="Race de l'Animal" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <textarea name="etat_sante" id="etat_sante" class="form-control my-3 p-3" rows="2" placeholder="Santé de l'animal" required></textarea>
                    </div>
                    <div class="col mb-3">
                        <textarea name="detail_sante" id="detail_sante" class="form-control my-3 p-3" rows="2" placeholder="Détail de la santé" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="nourriture" placeholder="Nourriture" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="number" name="grammage" placeholder="Grammage (en gr)" required>
                    </div>

                    <div class="col mb-3">
                        <label for="date_visite">Date de la visite:</label>
                        <input class="form-control" type="date" name="date_visite"  required>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="date_repas_pris">Date repas pris:</label>
                            <input class="form-control" type="date" name="date_repas_pris" required>
                        </div>
                        <div class="col mb-3">
                            <label for="heure_repas_pris">Heure repas pris:</label>
                            <input class="form-control" type="time" name="heure_repas_pris" required>
                        </div>
                    </div>

                    <hr class="mb-3">
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-outline-success">Enregistrer</button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="tableListingHabitats.php" class="btn btn-outline-danger">Annuler</a>
                        </div>
                    </div>
                    
                    <div class="mt-3 mb-5">
                        <!-- Lien de redirection après succès -->
                        <a href="../index.php" class="btn btn-secondary">Retour à la page d'accueil</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
    <?php include "../pagesFront/footer.php"; ?>
</html>
