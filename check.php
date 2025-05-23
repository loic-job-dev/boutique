<?php $title = "Boutique en ligne de loic-job-dev";
require(__DIR__ . '/header.php'); 

if (!isset($_SESSION['commande'])) {
    $_SESSION['commande'] = [];
}

print_r($_POST);

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
    $product_names = array_column($products, 'name');
    $index=0;
    foreach ($_POST['quantities'] as $key => $quantity) {
        //On parcours le tableau 'quantities'
        if (in_array($key, $product_names)) {
            //Si une quantité a été saisie
            $_SESSION["commande"][$index] = [
                //On définit les valeurs du tableau à l'index 'index' (gants, coquille, etc...)
                'name' => $products[$index]["name"],
                //On défini un nom à partir du tableau names créé dans le formulaire
                'price' => $products[$index]["price"],
                'weight' => $products[$index]["weight"],
                'quantity' => $quantity,
                //On est déjà en train de parcourir le tableau quantities
                'total_price' => $products[$index]["price"] * $quantity,
                'total_weight' => $products[$index]["weight"] * $quantity,
            ];
            $index++;
        }
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