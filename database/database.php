<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'loic', 'fakepassword', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
 }
 catch (Exception $e){
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

function getAllproducts ($mysqlClient) {
    $testStatement = $mysqlClient->prepare("SELECT * FROM products");
    $testStatement->execute();

    return $testStatement->fetchAll();
}

function getAllAvailableproducts ($mysqlClient) {
    $testStatement = $mysqlClient->prepare("SELECT * FROM products WHERE available = 1");
    $testStatement->execute();

    return $testStatement->fetchAll();
}

?>