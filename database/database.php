<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'loic', 'fakepassword', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// function testStatement($mysqlClient): void {

// $quantityUser = $_GET['quantityUser'] ?? '10';

// $testStatement = $mysqlClient->prepare("SELECT * FROM products WHERE quantity >= :quantity");
// $testStatement->execute(['quantity' => $quantityUser]);

// $testProducts = $testStatement->fetchAll();

// foreach ($testProducts as $key => $product) {
//     echo ("Id de l'article : " . $product['id'] . "<br>");
//     echo ("Nom de l'article : " . $product['name'] . "<br>");
//     echo ("Quantité disponible : " . $product['quantity'] . "<br>");
//     echo ('--------------------------------------' . "<br>");
//     }
// }

function getAllproducts($mysqlClient)
{
    $testStatement = $mysqlClient->prepare("SELECT * FROM products");
    $testStatement->execute();

    return $testStatement->fetchAll();
}

function getAllAvailableproducts($mysqlClient)
{
    $availableproducts = $mysqlClient->prepare("SELECT * FROM products WHERE available = 1");
    $availableproducts->execute();

    return $availableproducts->fetchAll();
}

function updateCatalog($mysqlClient)
{
    //récuparétion des valeurs du formulaire GET :
    if (empty($_GET)) {
        $updateProducts = $mysqlClient->prepare("SELECT * FROM products");
        $updateProducts->execute();
        return $updateProducts->fetchAll();

    } else {
        $sortPrice = strtoupper($_GET["sortPrice"] ?? "ASC");
        $priceMin = ($_GET["priceMin"] ?? 0) * 100;
        $priceMax = ($_GET["priceMax"] ?? 10000) * 100;
        $category = (int) ($_GET["category"] ?? 0);

        //Sécurisation de $sortPrice
        if (!in_array($sortPrice, ['ASC', 'DESC'])) {
            $sortPrice = 'ASC';
        }


        //création de la querry
        $updateProducts = $mysqlClient->prepare("SELECT * FROM products WHERE price > :priceMin AND price < :priceMax AND category_id = :category ORDER BY price $sortPrice");
        $params = ['priceMin' => $priceMin, 'priceMax' => $priceMax, 'category' => $category];
        if ($category == 0) {
            $updateProducts = $mysqlClient->prepare("SELECT * FROM products WHERE price >= :priceMin AND price <= :priceMax ORDER BY price $sortPrice");
            $params = ['priceMin' => $priceMin, 'priceMax' => $priceMax];
        }
        $updateProducts->execute($params);

        return $updateProducts->fetchAll();
    }
}
