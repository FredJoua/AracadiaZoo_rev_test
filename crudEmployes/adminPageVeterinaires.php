<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Espace Vétérinaires</title>

    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            padding-top: 75px; 
        }
        /* Ajout d'un espace entre le conteneur et le footer */
        .container-fluid {
            margin-bottom: 275px; 
        }
    </style>
</head>

<body>
    <?php include_once "../pagesFront/headerLogout.php"; ?>

    <h1>ARCADIA ZOO - Espace admin Vétérinaires</h1>
    <div class="container-fluid mt-5">

            <div class="col-md-4">
                <div class="custom-container">
                    <div class="center-content">
                        <h3 class="card-title">CR sur les animaux</h3><br>
                        <a class="btn btn-outline-warning" href="../crudHabitats/tableListingRapportVeterinaires.php">Comptes Rendus par les vétérinaires</a><br>
                        <a class="btn btn-outline-warning" href="../crudHabitats/viewCREmployes.php">Comptes Rendus par les Employes</a><br>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
    <?php include "../pagesFront/footer.php"; ?>
</html>