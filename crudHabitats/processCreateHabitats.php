<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Habitat</title>

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
                    <h4 class="alert-heading">Ajouter un Nouvel Habitat</h4>
                    <p></p>
                    <hr>
                </div>
                <form action="processCreateHabitats.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="prenom_animal" class="form-label">Prénom de l'animal</label>
                        <input type="text" class="form-control" id="prenom_animal" name="prenom_animal" required>
                    </div>
                    <div class="mb-3">
                        <label for="habitat" class="form-label">Nom de l'Habitat</label>
                        <input type="text" class="form-control" id="habitat" name="habitat" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_habitat" class="form-label">Description de l'Habitat</label>
                        <textarea class="form-control" id="description_habitat" name="description_habitat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Images de l'Habitat</label>
                        <input type="file" class="form-control" id="img" name="img[]" multiple>
                    </div>

                    <hr class="mb-3">
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-outline-success">Créer Habitat</button>
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
