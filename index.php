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


        <div class="container mt-5 mb-2">
            <div class="row justify-content-center">
                <div class="col">
                    <a href="cart.php" class="btn btn-primary">Mon panier</a>
                </div>
            </div>
        </div>

        <?php require(__DIR__ . '/multidimensional-catalog.php'); ?>


        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <a href="cart.php" class="btn btn-primary">Mon panier</a>
            </div>
        </div>


    </main>
    <?php require(__DIR__ . '/footer.php'); ?>
</body>

</html>