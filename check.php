<?php $title = "Boutique en ligne de loic-job-dev";
require(__DIR__ . '/header.php'); 

if (!isset($_SESSION['commande'])) {
    $_SESSION['commande'] = [];
}


foreach ($_POST['quantities'] as $key => $quantity) {
    if (!is_numeric($quantity) || $quantity < 0) { ?>
        <div class="alert alert-warning" role="alert">
            <p>Tricheur!</p>
            <p>La quantité doit être un chiffre positif !</p>
        </div>
        <div class="container-fluid ms-1 me-1">
            <form action="/end-session.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <input type="submit" name="submit" class="btn btn-primary" value="Retour accueil">
                </div>
            </div>
        </form>
        </div><?php
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    //Si la méthode est en POST et qu'un tableau 'quantities' est bien présent :
foreach ($_POST['quantities'] as $key => $quantity) {
    if (isset(getAllproducts ($mysqlClient)[$key])) {
        if ($_POST["quantities"][$key] != 0) {
        $_SESSION["commande"][$key] = [
            'name' => getAllproducts ($mysqlClient)[$key]["name"],
            'price' => getAllproducts ($mysqlClient)[$key]["price"],
            'weight' => getAllproducts ($mysqlClient)[$key]["weight"],
            'quantity' => $quantity,
            'total_price' => getAllproducts ($mysqlClient)[$key]["price"] * $quantity,
            'total_weight' => getAllproducts ($mysqlClient)[$key]["weight"] * $quantity,
        ];
        } }
        else { ?>
            <div class="alert alert-warning" role="alert">
                <p>Tricheur!</p>
                <p>Merci de ne pas pirater le site !</p>
            </div>
            <div class="container-fluid ms-1 me-1">
                <form action="/end-session.php" method="POST">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <input type="submit" name="submit" class="btn btn-primary" value="Retour accueil">
                    </div>
                </div>
                </form>
            </div><?php
        exit();
        }
    }
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

header('Location: /cart.php');
exit();

require(__DIR__ . '/footer.php'); ?>