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
        <?php echo 'Panier';

        //define variables and set to empty values
        $quantityProduct = "";
        $nameProduct = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $quantityProduct = $_POST["quantity"];
            $nameProduct = $_POST["name"];
            $priceProduct = $_POST["price"];
            $totalTTC = $quantityProduct * $priceProduct;
        }

        echo "<h4>Your Input:</h4>";
        echo "Nom du produit : " . $nameProduct . "<br>";
        echo "Quantité commandée : " . $quantityProduct . "<br>";
        echo "Prix unitaire : ";
        echo formatPrice($priceProduct) . "<br>";
        echo "Prix HT unitaire : ";
        echo formatPrice(priceExcludingVAT($priceProduct)) . "<br>";
        echo "Prix total TTC : ";
        echo formatPrice($totalTTC);
        ?>


        <a href="index.php">Accueil</a>

    </main>
    <?php require(__DIR__ . '/footer.php'); ?>
</body>

</html>