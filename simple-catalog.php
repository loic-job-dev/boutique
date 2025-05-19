<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Catalogue simple de la boutique non-officielle</title>
</head>

<?php 
$products = ["Gants", "Protège-dents", "Coquille", "Protège-tibia"];

echo "Nombre de produits dans le tableau : " . count($products) . "<br>";

sort($products);

echo "Premier produit : " . ($products[0]) . "<br>";

echo "Dernier produit : " . ($products[count($products)-1]) . "<br>" . "<br>";
?>

</html>