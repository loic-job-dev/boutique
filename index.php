<?php session_start(); ?>

<?php include(__DIR__ . '/my-functions.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Boutique en ligne de loic-job-dev</title>
    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?php require(__DIR__ . '/header.php'); ?>
    <main class="min-vh-100">
        <?php echo 'Bienvenue dans mon projet';
        //require(__DIR__ . '/item.php');
        //require(__DIR__ . '/simple-catalog.php');
        //require(__DIR__ . '/catalog-with-keys.php');
        require(__DIR__ . '/multidimensional-catalog.php'); ?>

        <?php
        //define variables and set to empty values
        // $quantityProduct = "";
        // $nameProduct = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nameProduct = $_POST["name"];
            $quantitiesProduct = $_POST["quantities"[$nameProduct]];       
        }

        echo "<h2>Your Input:</h2>";
        echo $nameProduct;
        echo $quantitiesProduct;
        ?>

        <a href="cart.php">Mon panier</a>

    </main>
    <?php require(__DIR__ . '/footer.php'); ?>
</body>

</html>