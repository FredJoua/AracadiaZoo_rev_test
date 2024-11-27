<?php
include_once("../dbconn.php");

$sql = "SELECT prenom_animal, consultations FROM Habitats ORDER BY consultations DESC";
$query = $conn->prepare($sql);
$query->execute();
$consultations = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Consultations des Animaux</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Consultations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultations as $consultation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($consultation['prenom_animal']); ?></td>
                        <td><?php echo htmlspecialchars($consultation['consultations']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
