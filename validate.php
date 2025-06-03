<?php 

require(__DIR__ . '/header.php'); 

//Déclaration de variables pour les requêtes dans la table "orders"
$shipping_cost = $_SESSION["transportFees"];
$total = $_SESSION["totalCart"];

//Récupération de la valeur de "number" précédente pour l'incrémenter
$previousNumberStmt = $mysqlClient->prepare("SELECT number FROM orders ORDER BY id DESC LIMIT 1;");
$previousNumberStmt->execute();
$previousNumber = $previousNumberStmt->fetch();
$index = strval($previousNumber['number']);
$number = str_pad(((int)$index + 1), 10, '0', STR_PAD_LEFT);

//Création de la requête d'ajout dans la BDD sur la table "orders"
$querry = "INSERT INTO orders (number, date, shipping_cost, total, customer_id) VALUES (:number, NOW(), :shipping_cost, :total, 2)";
$params = ['number' => $number, 'shipping_cost' => $shipping_cost, 'total' => $total];
$orderCheked = $mysqlClient->prepare($querry);

$orderCheked->execute($params);

$orderCheked->fetchAll();


//Boucle sur le tableau pour ajout à la table order_product
$order_id = $mysqlClient->lastInsertId();
foreach ($_SESSION["commande"] as $key => $product) {
    $product_id = $_SESSION["commande"][$key]["id"];
    $quantity = $_SESSION["commande"][$key]["quantity"];
    $products_weight = $_SESSION["commande"][$key]["total_weight"];

    $querry = "INSERT INTO order_product (order_id, product_id, quantity, products_weight) VALUES ($order_id,:product_id, :quantity, :products_weight)";
    $params = ['product_id' => $product_id, 'quantity' => $quantity, 'products_weight' => $products_weight];

    $orderProduct = $mysqlClient->prepare($querry);

    $orderProduct->execute($params);

    $orderProduct->fetchAll();
}
?>

<h3>Commande passée !</h3>

<?php 
require(__DIR__ . '/footer.php');

?>