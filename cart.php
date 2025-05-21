<?php session_start(); ?>

<?php include(__DIR__ . '/my-functions.php'); ?>

<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Catalogue simple de la boutique non-officielle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?php require(__DIR__ . '/header.php'); ?>
    <main class="min-vh-100">

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
                if ($quantity > 0) {
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

        (float) $totalProducts = 0;
        foreach ($_SESSION["commande"] as $product) {
            $totalProducts = $totalProducts += $product["total_price"];
        }

        (float) $totalWeight = 0;
        foreach ($_SESSION["commande"] as $product) {
                $totalWeight = $totalWeight += $product["total_weight"];
        }

        $_SESSION["transportFees"] = 0; 

        //(string) $transporterChosen = $_SESSION["transporter"];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['weights'])) {
            if ($totalWeight <= 200) {
                $_SESSION["transportFees"] = 500;
            }
            elseif ($totalWeight > 200 && $totalWeight <= 1000) {
                $_SESSION["transportFees"] = ($totalProducts/10);
            }
            else {
                $_SESSION["transportFees"] = 0;
            }
        }

        $totalCart = 0;
        $_SESSION["totalCart"] = $totalProducts + $_SESSION["transportFees"];

        ?>

        <?php require(__DIR__ . '/table-cart.php'); ?>

        <?php require(__DIR__ . '/transport-cart.php'); ?>


        <a href="index.php">Accueil</a>

    </main>
    <?php require(__DIR__ . '/footer.php'); ?>
</body>

</html>