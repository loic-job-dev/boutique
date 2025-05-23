    <?php $title = "Catalogue Karv maga de loic-job-dev";
    require(__DIR__ . '/header.php'); ?> 

        <?php

        //Calcul des totaux
        (float) $totalProducts = 0;
        foreach ($_SESSION["commande"] as $product) {
            $totalProducts = $totalProducts += $product["total_price"];
        }

        (float) $totalWeight = 0;
        foreach ($_SESSION["commande"] as $product) {
            $totalWeight = $totalWeight += $product["total_weight"];
        }



        //Calcul du total (produits + frais de port)
        $totalCart = 0;
        $_SESSION["totalCart"] = $totalProducts + $_SESSION["transportFees"];

        ?>

        <?php require(__DIR__ . '/table-cart.php');?>

        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-primary">Accueil</a>
            </div>
        </div>

    <?php require(__DIR__ . '/footer.php'); ?>