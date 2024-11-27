<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Habitat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Ajouter un Nouvel Habitat</h2>
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
            <button type="submit" class="btn btn-primary">Créer Habitat</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
