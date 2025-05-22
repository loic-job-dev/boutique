<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Catalogue avec clés de la boutique non-officielle</title>
</head>

<?php

$gants = [
    "name" => "Gants",
    "price" => 2000,
    "weight" => 300,
    "discount" => 10,
    "picture_url" => "/pictures/gants-de-boxe-120-ergonomiques-noirs.avif"
];

$protege_dents = [
    "name" => "Protège-dents",
    "price" => 1500,
    "weight" => 20,
    "discount" => 0,
    "picture_url" => "/pictures/protege-dents-de-boxe-et-arts-martiaux-adulte-mono-matiere.avif"
];

$coquille = [
    "name" => "Coquille",
    "price" => 1500,
    "weight" => 50,
    "discount" => 0,
    "picture_url" => "/pictures/coquille-de-protection-slipee-homme-100-blanc.avif"
];

$protege_tibia = [
    "name" => "Protège-tibia",
    "price" => 2500,
    "weight" => 100,
    "discount" => 10,
    "picture_url" => "/pictures/protege-tibia-full-contact-et-boxe-francaise-adulte.avif"
];
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 col-lg-4 my-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title"><?= $coquille["name"] ?></h3>
                    <p class="card-text text-wrap">Prix : <?= formatPrice($coquille["price"]) ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(priceExcludingVAT($coquille["price"])); ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(discountedPrice($coquille["price"], $coquille["discount"])); ?></p>
                </div>
                <img src="<?= $coquille["picture_url"] ?>" alt="<?= $coquille["name"] ?>" class="card-img-top">
                <a class="btn btn-primary" href="" role="button">Commander</a>
            </div>
        </div>

        <div class="col-6 col-lg-4 my-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title"><?= $protege_dents["name"] ?></h3>
                    <p class="card-text text-wrap">Prix : <?= formatPrice($protege_dents["price"]) ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(priceExcludingVAT($protege_dents["price"])); ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(discountedPrice($protege_dents["price"], $protege_dents["discount"])); ?></p>
                </div>
                <img src="<?= $protege_dents["picture_url"] ?>" alt="<?= $protege_dents["name"] ?>" class="card-img-top">
                <a class="btn btn-primary" href="" role="button">Commander</a>
            </div>
        </div>

        <div class="col-6 col-lg-4 my-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title"><?= $gants["name"] ?></h3>
                    <p class="card-text text-wrap">Prix : <?= formatPrice($gants["price"]) ?> </p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(priceExcludingVAT($gants["price"])); ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(discountedPrice($gants["price"], $gants["discount"])); ?></p>
                </div>
                <img src="<?= $gants["picture_url"] ?>" alt="<?= $gants["name"] ?>" class="card-img-top">
                <a class="btn btn-primary" href="" role="button">Commander</a>
            </div>
        </div>

        <div class="col-6 col-lg-4 my-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title"><?= $protege_tibia["name"] ?></h3>
                    <p class="card-text text-wrap">Prix : <?= formatPrice($protege_tibia["price"]) ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(priceExcludingVAT($protege_tibia["price"])); ?></p>
                    <p class="card-text text-wrap">Prix : <?= formatPrice(discountedPrice($protege_tibia["price"], $protege_tibia["discount"])); ?></p>
                </div>
                <img src="<?= $protege_tibia["picture_url"] ?>" alt="<?= $protege_tibia["name"] ?>" class="card-img-top">
                <a class="btn btn-primary" href="" role="button">Commander</a>
            </div>
        </div>
    </div>
</div>


</html>