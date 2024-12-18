<?php
session_start(); //Appel à session_start() en début de fichier
include_once "pagesFront/header.php"; // Inclusion du header après session_start()
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index HomePage</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="styleFooter.css">
    </head>
<body>
  <main class="main">
    <section class="card-lg__container">
      <p class="card__text-sm">La forêt de Brocéliande - en Bretagne</p>
      <h1 class="card__text-lg">ARCADIA ZOO</h1>
      <p class="card__text-md">Bienvenue à Arcadia Zoo, où la magie de la nature rencontre l'aventure bretonne !</p>
      <a href="html/pageAccueil.php" class="card__btn">Cliquez ici pour plus d'histoire !</a>
    </section>

    <section class="card-sm__container">
      <!--- START: CARD --->
      <a href="./crudHabitats/habitatsJungle.php">
          <section class="card-sm" style="background-image:url('./img/TigreBlanc4.jpg');">
            <p class="card__text-sm">Jungle</p>
            <h1 class="card__text-lg">Tigre Blanc</h1>
          </section>
      </a>
      <!--- END: CARD --->

      <!--- START: CARD --->
      <a href="./crudHabitats/habitatsSavane.php">
          <section class="card-sm" href="./crudHabitats/habitatsSavane.php" style="background-image: url('./img/Girafe2.jpg'); background-position: center right;">
            <p class="card__text-sm">Savane</p>
            <h1 class="card__text-lg">La Girafe</h1>
          </section>
      </a>
      <!--- END: CARD --->

      <!--- START: CARD --->
      <a href="./crudHabitats/habitatsMarais.php">
          <section class="card-sm" href="./crudHabitats/habitatsMarais.php" style="background-image: url('./img/Rhino1.jpg')">
            <p class="card__text-sm">Marais</p>
            <h1 class="card__text-lg">Rhinocéros  </h1>
          </section>
      </a>
      <!--- END: CARD --->

      <!--- START: CARD --->
      <a href="./crudHabitats/pageTousLesHabitats.php">
          <section class="card-sm" href="./crudHabitats/habitatsTous.php" style="background-image: url('./img/Toucan1.jpg')">
            <p class="card__text-sm">Tous</p>
            <h1 class="card__text-lg">Toucan</h1>
          </section>
      </a>
      <!--- END: CARD --->

  </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    <?php include "./pagesFront/footer.php" ?>
</html>
