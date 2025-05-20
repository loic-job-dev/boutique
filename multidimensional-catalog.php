<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Catalogue avec clés de la boutique non-officielle</title>
</head>

<?php
$products = [

    "gants" => [
        "name" => "Gants",
        "price" => 2000,
        "weight" => 300,
        "discount" => 10,
        "picture_url" => "/pictures/gants-de-boxe-120-ergonomiques-noirs.avif"
    ],
    "protege_dents" => [
        "name" => "Protège-dents",
        "price" => 1500,
        "weight" => 20,
        "discount" => 0,
        "picture_url" => "/pictures/protege-dents-de-boxe-et-arts-martiaux-adulte-mono-matiere.avif"
    ],
    "coquille" => [
        "name" => "Coquille",
        "price" => 1500,
        "weight" => 50,
        "discount" => 0,
        "picture_url" => "/pictures/coquille-de-protection-slipee-homme-100-blanc.avif"
    ],
    "protege_tibia" => [
        "name" => "Protège-tibia",
        "price" => 2500,
        "weight" => 100,
        "discount" => 10,
        "picture_url" => "/pictures/protege-tibia-full-contact-et-boxe-francaise-adulte.avif"
    ]
];
sort($products);
?>

<div class="container mt-5 mb-5">
    <form action="/cart.php" method="POST">
        <div class="row justify-content-center">

            <?php foreach ($products as $key => $product) { ?>

                <!-- $key est l’identifiant unique (gants, coquille, etc.).
            $product est le tableau de données du produit (nom, prix, poids, image…). -->

                <div class="col-6 col-lg-4 my-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h3 class="card-title"><?= $product["name"] ?></h3>
                            <p class="card-text text-wrap">Prix : <?= formatPrice($product["price"]) ?></p>
                            <p class="card-text text-wrap">Prix HT : <?= formatPrice(priceExcludingVAT($product["price"])); ?></p>
                            <p class="card-text text-wrap">Prix discount : <?= formatPrice(discountedPrice($product["price"], $product["discount"])); ?></p>
                        </div>
                        <img src="<?= $product["picture_url"] ?>" alt="<?= $product["name"] ?>" class="card-img-top">

                        <fieldset>
                            <label for="quantity_<?= $key ?>">Quantité :</label>
                            <input type="number" id="quantity_<?= $key ?>" name="quantities[<?= $key ?>]" min="0" step="1" value="0" required>
                            <input type="hidden" name="names[<?= $key ?>]" value="<?= $product['name'] ?>">
                            <input type="hidden" name="prices[<?= $key ?>]" value="<?= $product['price'] ?>">
                            <input type="hidden" name="weights[<?= $key ?>]" value="<?= $product['weight'] ?>">
                            <!-- Tous les noms de champs utilisent name="champs[<?= $key ?>]" pour lier les données à chaque produit unique. -->

                        </fieldset>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Commander">
        <!-- Le </form> est en dehors de la boucle, c’est un seul formulaire pour tous les produits. -->

    </form>
</div>

</html>