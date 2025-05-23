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

        //Récupération de nom du transporteur
        if (!isset($_SESSION["transporterChosen"])) {
            $_SESSION["transporterChosen"] = null;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["transporter"])) {
            $_SESSION["transporterChosen"] = $_POST["transporter"];
        }


        //Initialisation des frais de livraison
        if (!isset($_SESSION["transportFees"])) {
            $_SESSION["transportFees"] = 0;
        }

        //Calcul des frais de port en fonction du livreur
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($transportFees as $transport => $fees) {
                if ($_SESSION["transporterChosen"] === $transport) {
                    $_SESSION["transportFees"] = 0000;

                    if ($totalWeight <= 200) {
                        $_SESSION["transportFees"] = $transportFees[$transport]['weight_200'];
                    } 

                    if ($totalWeight > 200 && $totalWeight <= 1000) {
                        $_SESSION["transportFees"] = $transportFees[$transport]['weight_1000'];
                    }

                }
            }
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