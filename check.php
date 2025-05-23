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
        //On parcours le tableau 'quantities'
        if ($quantity >= 0) {
            //Si une quantité a été saisie
            $_SESSION["commande"][$key] = [
                //On définit les valeurs du tableau à l'index 'key' (gants, coquille, etc...)
                'name' => $products[$key]["name"],
                //On défini un nom à partir du tableau names créé dans le formulaire
                'price' => $products[$key]["price"],
                'weight' => $products[$key]["weight"],
                'quantity' => $quantity,
                //On est déjà en train de parcourir le tableau quantities
                'total_price' => $products[$key]["price"] * $quantity,
                'total_weight' => $products[$key]["weight"] * $quantity,
            ];
        }
    }
}

header('Location: /cart.php');
exit();

require(__DIR__ . '/footer.php'); ?>