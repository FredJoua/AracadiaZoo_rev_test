<?php
include_once("../dbconn.php");

$prenom_animal = $etat_sante = $detail_sante = $date_visite = "";
$errorMessage = $successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Method GET pour montrer les données de l'habitat
    if (!isset($_GET["id_habitat"])) {
        header("location:tableListingRapportVeterinaires.php");
        exit;
    }

    $id = $_GET["id_habitat"];
    // Read la ligne de l'habitat sélectionné dans la bd
    $sql = "SELECT * FROM habitats WHERE id_habitat=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        header("location:tableListingRapportVeterinaires.php");
        exit;
    }

    $id_habitat = $row['id_habitat'];
    $prenom_animal = $row['prenom_animal'];
    $etat_sante = $row['etat_sante'];
    $detail_sante = $row['detail_sante'];
    $date_visite = $row['date_visite'];
} else {
    // Method POST pour apporter des modifications
    $id_habitat = $_POST['id_habitat'];
    $prenom_animal = $_POST['prenom_animal'];
    $etat_sante = $_POST['etat_sante'];
    $detail_sante = $_POST['detail_sante'];
    $date_visite = $_POST['date_visite'];

    do {
        if (empty($prenom_animal) || empty($etat_sante) || empty($detail_sante) || empty($date_visite)) {
            $errorMessage = "ATTENTION ! Tous les champs doivent être remplis";
            break;
        }

        $sql = "UPDATE habitats SET etat_sante=:etat_sante, detail_sante=:detail_sante, date_visite=:date_visite WHERE id_habitat = :id_habitat";
        $query = $conn->prepare($sql);
        $query->bindParam(':id_habitat', $id_habitat, PDO::PARAM_INT);
        $query->bindParam(':etat_sante', $etat_sante, PDO::PARAM_STR);
        $query->bindParam(':detail_sante', $detail_sante, PDO::PARAM_STR);
        $query->bindParam(':date_visite', $date_visite, PDO::PARAM_STR);

        if ($query->execute()) {
            $successMessage = "Données vétérinaire modifiée avec succès";
            header("location:tableListingRapportVeterinaires.php");
            exit();
        } else {
            $errorMessage = "Erreur dans la mise à jour: " . implode(", ", $query->errorInfo());
            break;
        }
    } while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier employé</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .readonly {
            background-color: #e9ecef; /* Couleur de fond grise */
            cursor: not-allowed; /* Curseur non autorisé */
        }
    </style>

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-3">
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Espace Vétérinaires: <br> Comptes rendus par animaux</h4>
                    <hr>
                </div>

                <form action="formUpdateVeterinaires.php" method="post">
                    <input type="hidden" name="id_habitat" value="<?php echo htmlspecialchars($id_habitat); ?>">

                    <div class="mb-3">
                        <input type="text" name="prenom_animal" value="<?php echo htmlspecialchars($prenom_animal); ?>" class="form-control my-3 p-3 readonly" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="etat_sante" placeholder="Etat Santé" value="<?php echo htmlspecialchars($etat_sante); ?>">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control my-3 p-3" name="detail_sante" placeholder="Détail Santé"><?php echo htmlspecialchars($detail_sante); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="date" name="date_visite" placeholder="Date visite" value="<?php echo htmlspecialchars($date_visite); ?>">
                    </div>
                    <?php
                    // Message d'alerte pour le succès
                    if (!empty($successMessage)) {
                        echo '
                        <div class="row mb-3">
                            <div class="offset-sm-3 col-sm-6">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>' . htmlspecialchars($successMessage) . '</strong>
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="close"></button>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                    <hr class="mb-3">
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-outline-success">Enregistrer</button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="tableListingRapportVeterinaire.php" class="btn btn-outline-danger">Annuler</a>
                        </div>
                    </div>
                </form>

                <div class="mt-3">
                    <!-- Lien de redirection vers la page d'accueil à tout moment -->
                    <a href="../index.php" class="btn btn-secondary">Retour à la page d'accueil</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
