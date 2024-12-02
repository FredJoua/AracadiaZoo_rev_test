<?php
include_once "../dbconn.php"; 

$message = "";

// Création d'un nouvel horaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    try {
        // Préparer la requête d'insertion
        $sql = "INSERT INTO horaires (jour, ouverture, fermeture) VALUES (:jour, :ouverture, :fermeture)";
        $stmt = $conn->prepare($sql);

        // Liaison des valeurs avec les paramètres de la requête
        $stmt->bindParam(':jour', $jour);
        $stmt->bindParam(':ouverture', $ouverture);
        $stmt->bindParam(':fermeture', $fermeture);

        // Exécution de la requête
        if ($stmt->execute()) {
            $message = "Nouvel horaire ajouté avec succès!";
            // Redirection vers une page de confirmation ou autre
            header("Location: formHoraires.php");
            exit();
        } else {
            $message = "Erreur lors de l'ajout de l'horaire. : " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        // En cas d'erreur PDO, afficher un message d'erreur
        $message = "Erreur PDO lors de l'ajout de l'horaire : " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les Horaires</title>

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

    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="../img/Toucan3.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="text py-3">Form Créer Les Horaires</h1>
                    <?php if ($message): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <form action="formHoraires.php" method="post">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="text" name="jour" placeholder="Indiquez les jours ouverts" class="form-control my-3 p-3" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-10">                                
                                <lable for="time" class="form-lable">Horaire d'ouverture</lable>
                                <input type="time" name="ouverture" placeholder="Heure d'ouverture" class="form-control my-3 p-3" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <lable for="time" class="form-lable">Horaire de fermeture</lable>
                                <input type="time" name="fermeture" placeholder="Heure de fermeture" class="form-control my-3 p-3" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10 d-flex justify-content-center">
                                <div class="d-grid gap-2 col-5 mx-auto">
                                    <button type="submit" name="create" class="btn btn-outline-success">Enregistrer</button>
                                </div>
                                <div class="d-grid gap-2 col-5 mx-auto">
                                    <a href="formHoraires.php" class="btn btn-outline-danger">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
    <?php include "../pagesFront/footer.php"; ?>
</html>