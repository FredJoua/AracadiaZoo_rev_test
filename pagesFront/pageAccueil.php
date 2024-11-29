<?php
session_start(); // Appel à session_start() en début de fichier
include "header.php"; // Inclusion du header après session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Accueil Zoo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylePageAccueil.css">

<body>
<div class="container-fluid p-0">
    <div class="jumbotron bg-cover text-white mb-0 header-image">
        <div class="container py-5 header-text">
            <h1 class="display-4 font-weight-bold">Bienvenue à Arcadia ZOO !</h1>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Arcadia Zoo</h1>
                <p> Depuis 1960, Arcadia ZOO s'est imposé comme une référence incontournable 
                    dans le monde de la conservation et de la préservation de la faune. 
                    Niché au cœur de la magnifique forêt de Brocéliande, en Bretagne, 
                    notre zoo offre une expérience unique, où la nature rencontre la magie.
                </p><br><br>
            </div>
        </div>

        <div class="row justify-content">
            <div class="col-md-8 text-justify">
                <h1>Qui sommes-nous : </h1>
                    <p>
                        Arcadia ZOO abrite une incroyable diversité d'animaux, 
                        chacun évoluant dans des habitats soigneusement recréés, 
                        tels que la savane, la jungle et les marais. Notre engagement 
                        envers le bien-être de nos pensionnaires est notre priorité absolue. 
                        Chaque jour, une équipe dévouée de vétérinaires qualifiés effectue 
                        des contrôles minutieux sur chaque animal avant l'ouverture du zoo, 
                        garantissant ainsi leur santé et leur bonheur.
                    </p>
                    <p>
                        Nous croyons fermement en une approche holistique de la gestion des 
                        animaux, en veillant à ce que leur environnement soit enrichissant 
                        et stimulant. De plus, notre équipe de nutritionnistes travaille en 
                        étroite collaboration avec nos vétérinaires pour fournir une alimentation 
                        équilibrée, adaptée à chaque espèce. Chaque gramme de nourriture est soigneusement pesé, 
                        conforme aux recommandations précises de nos experts.
                    </p>
                    <p>
                        Chez Arcadia ZOO, le bonheur et le bien-être de nos animaux sont au cœur 
                        de notre mission. C'est une source de fierté pour notre directeur, 
                        José, dont les ambitions sont à la hauteur de la grandeur de notre zoo. Venez nous rendre visite et découvrez par vous-même la magie d'Arcadia ZOO, où chaque jour est une aventure extraordinaire dans le monde sauvage.
                    </p>

                <div class="alert alert-info" role="alert">
                    <div class="text-center">
                        <strong>"Arcadia Zoo : Où les animaux prennent vie !"</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

<?php include "footer.php" ?>
</html>