<?php session_start(); ?>

<?php include(__DIR__ . '/my-functions.php'); ?>
<?php include(__DIR__ . '/datas.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title> <?= $title ?? "Boutique de loic-job-dev" ?></title>
    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<body>

<header>
    <div class="container-fluid border-bottom border-3 border-dark mb-5">
        <div class="row" id="header">
            <div class="col-12 col-lg-10">
                <h1>Boutique en ligne de loic-job-dev</h1>
                <h2>Le meilleur équipement pour le krav maga</h2>
            </div>
        </div>
    </div>
</header>