<?php
include_once '../dbconn.php';

if ($conn === null) {
    die("Erreur de connexion à la base de données.");
}

$message = ""; // Initialisation de la variable $message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jour = $_POST['jour'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];
    $fermeture_exceptionnelle = isset($_POST['fermeture_exceptionnelle']) ? 1 : 0;

    $sql = "UPDATE horaires SET ouverture=:ouverture, fermeture=:fermeture, fermeture_exceptionnelle=:fermeture_exceptionnelle WHERE jour=:jour";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':ouverture', $ouverture);
    $stmt->bindParam(':fermeture', $fermeture);
    $stmt->bindParam(':fermeture_exceptionnelle', $fermeture_exceptionnelle);
    $stmt->bindParam(':jour', $jour);

    if ($stmt->execute()) {
        $message = "Horaire mis à jour avec succès.";
        header("Location: affichageHoraires.php");
        exit();
    } else {
        $message = "Erreur lors de la mise à jour: " . $stmt->errorInfo()[2];
    }
}

$sql = "SELECT * FROM horaires";
$stmt = $conn->query($sql);
$jours = [
    'Monday' => 'Lundi',
    'Tuesday' => 'Mardi',
    'Wednesday' => 'Mercredi',
    'Thursday' => 'Jeudi',
    'Friday' => 'Vendredi',
    'Saturday' => 'Samedi',
    'Sunday' => 'Dimanche'
];
?>

<!doctype html>
<html lang="fr">
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
                    <h1 class="text py-3">Modifier les horaires d'ouverture</h1>
                    <?php if ($message): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="jour" class="form-label">Jour</label>
                                <select name="jour" id="jour" class="form-control my-3 p-3">
                                    <?php foreach ($jours as $eng_day => $fr_day): ?>
                                    <option value="<?php echo $eng_day; ?>"><?php echo $fr_day; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-10">                                
                                <label for="ouverture" class="form-label">Horaire d'ouverture</label>
                                <input type="time" name="ouverture" id="ouverture" placeholder="Heure d'ouverture" class="form-control my-3 p-3" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-10">                                
                                <label for="fermeture" class="form-label">Heure de fermeture</label>
                                <input type="time" name="fermeture" id="fermeture" placeholder="Heure de fermeture" class="form-control my-3 p-3" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-10">
                                <div class="form-check my-3">
                                    <input type="checkbox" name="fermeture_exceptionnelle" id="fermeture_exceptionnelle" class="form-check-input">
                                    <label for="fermeture_exceptionnelle" class="form-check-label">Fermeture exceptionnelle</label>
                                </div>
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
<?php $conn = null; ?>