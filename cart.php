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
        $commande = [];
        //on initialise un tableau vide qui contiendra les produits commandés.

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
            //Si la méthode est en POST et qu'un tableau 'quantities' est bien présent :
            foreach ($_POST['quantities'] as $key => $quantity) {
                //On parcours le tableau 'quantities'
                if ($quantity > 0) {
                    //Si une quantité a été saisie
                    $commande[$key] = [
                        //On définit les valeurs du tableau à l'index 'key' (gants, coquille, etc...)
                        'name' => $_POST['names'][$key],
                        //On défini un nom à partir du tableau names créé dans le formulaire
                        'price' => $_POST['prices'][$key],
                        'weight' => $_POST['weights'][$key],
                        'quantity' => $quantity,
                        //On est déjà en train de parcourir le tableau quantities
                        'total_price' => $_POST['prices'][$key] * $quantity,
                    ];
                }
            }
        }
        ?>

        <?php
        print_r($commande);
        ?>

        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col"></div>
            </div>
        </div>

        <a href="index.php">Accueil</a>

    </main>
    <?php require(__DIR__ . '/footer.php'); ?>
</body>

</html>