<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Card pour un produit de la boutique en ligne de loic-job-dev</title>
</head>

<?php
$name = "Gants";
$description = "Voici des gants de boxe de débutants";
$picture = "/pictures/gants-de-boxe-120-ergonomiques-noirs.avif";
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 col-lg-4 my-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title"><?= $name ?></h3>
                    <p class="card-text text-wrap"><?= $description ?></p>
                </div>
                <img src="<?= $picture ?>" alt="<?= $name ?>" class="card-img-top">
                <a class="btn btn-primary" href="" role="button">Commander</a>
            </div>
        </div>
    </div>
</div>


</html>