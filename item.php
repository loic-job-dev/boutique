<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>

<body>
    <h1>Item page</h1>

    <?php
    $name = "Gants";
    $description = "Voici des gants de boxe de débutants";
    $picture = "/pictures/gants-de-boxe-120-ergonomiques-noirs.avif";
    ?>
    <h2><?= $name ?></h2>
    <p><?= $description ?></p>
    <img src="<?= $picture ?>" alt="<?= $name ?>">

</body>

</html>