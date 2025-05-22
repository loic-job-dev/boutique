    <!-- <?php $title = "Catalogue Karv maga de loic-job-dev";
    require(__DIR__ . '/header.php'); ?> -->

        <?php
        if (!isset($_SESSION['commande'])) {
            $_SESSION['commande'] = [];
        }
        //on initialise un tableau vide qui contiendra les produits commandés.
        //Si le tableau existe, on ne l'écrase pas

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
            //Si la méthode est en POST et qu'un tableau 'quantities' est bien présent :
            foreach ($_POST['quantities'] as $key => $quantity) {
                //On parcours le tableau 'quantities'
                if ($quantity >= 0) {
                    //Si une quantité a été saisie
                    $_SESSION["commande"][$key] = [
                        //On définit les valeurs du tableau à l'index 'key' (gants, coquille, etc...)
                        'name' => $_POST['names'][$key],
                        //On défini un nom à partir du tableau names créé dans le formulaire
                        'price' => $_POST['prices'][$key],
                        'weight' => $_POST['weights'][$key],
                        'quantity' => $quantity,
                        //On est déjà en train de parcourir le tableau quantities
                        'total_price' => $_POST['prices'][$key] * $quantity,
                        'total_weight' => $_POST['weights'][$key] * $quantity,
                    ];
                }
            }
        }

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["transporter"])) {
            $_SESSION["transporterChosen"] = $_POST["transporter"];
        }


        //Initialisation des frais de livraison
        if (!isset($_SESSION["transportFees"])) {
            $_SESSION["transportFees"] = 0;
        }

        //Calcul des frais de port en fonction du livreur
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['weights'])) {
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

        <?php require(__DIR__ . '/table-cart.php'); ?>

        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-primary">Accueil</a>
            </div>
        </div>

    <?php require(__DIR__ . '/footer.php'); ?>