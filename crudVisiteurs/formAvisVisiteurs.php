<?php
include_once "../dbconn.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
    $commentaires = isset($_POST['commentaires']) ? $_POST['commentaires'] : '';
    $statut = 'En attente';

    // Vérifier si le champ de commentaires n'est pas vide
    if (!empty($commentaires)) {
        try {
            // Préparer la requête d'insertion
            $sql = "INSERT INTO visiteurs (pseudo, commentaires, statut) VALUES (:pseudo, :commentaires, :statut)";
            $query = $conn->prepare($sql); 
            
            // Liaison des valeurs avec les paramètres de la requête
            $query->bindParam(':pseudo', $pseudo);
            $query->bindParam(':commentaires', $commentaires);
            $query->bindParam(':statut', $statut);
            
            // Exécution de la requête
            if ($query->execute()) {
                // Redirection vers une page de confirmation ou autre
                header("Location: commentsEnAttente.php");
                exit();
            } else {
                echo "Erreur d'insertion du commentaire : " . implode(", ", $query->errorInfo());
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion du commentaire : " . $e->getMessage();
        }
    } else {
        echo "Le champ de commentaires est vide.";
    }
}

$cnx = null;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contactez-nous</title>

    <!-- Bootstrap CSS-->
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
    <?php include_once "../pagesFront/header.php"; ?>

<section class="form my-4 mx-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="../img/lama3.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <h1 class="text py-3">Votre avis compte!</h1>
                <form action="formAvisVisiteurs.php" method="post">
                    <div class="form-row">
                        <div class="col-lg-10">
                            <input type="text" name="pseudo" value="" placeholder="votre pseudo" class="form-control my-3 p-3" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <textarea name="commentaires" type="text" class="form-control my-3 p-3" rows="8" placeholder="Votre commentaire"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10 d-flex justify-content-center">
                            <div class="d-grid gap-2 col-5 mx-auto">
                                <button type="submit" name="approve_comment" class="btn btn-outline-success">Soumettre</button>
                            </div>
                            <div class="d-grid gap-2 col-5 mx-auto">
                                <a href="../index.php" class="btn btn-outline-danger">Annuler</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    <?php include "../pagesFront/footer.php"; ?>
</html>