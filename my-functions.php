<?php 

function formatPrice (float $price) {
    echo number_format($price / 100, 2, ',', ' ') . " €";
}

function priceExcludingVAT(float $price): float {
    return (100 * $price) / (100 + 5);
}


function discountedPrice(float $price, int $discount): float {
    $var = 100-$discount;
    return $price * $var / 100;
}


function emptyCart(): void {
        if (isset($_SESSION['commande'])) {
            $_SESSION['commande'] = [];
        }
}


?>