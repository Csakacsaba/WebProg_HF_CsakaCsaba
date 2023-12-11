<?php

function fetchDataFromApi($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
        return false;
    }

    return json_decode($response, true);
}

$urlProducts = 'https://fakestoreapi.com/products';
$products = fetchDataFromApi($urlProducts);

if ($products) {
    $productPrices = array_column($products, 'price');
} else {
    echo "No products found.";
}

$urlCart = 'https://fakestoreapi.com/carts/user/3';
$carts = fetchDataFromApi($urlCart);

if ($carts) {
    $sum = 0;
    foreach ($carts as $key => $cart) {
        foreach ($cart["products"] as $cartArray) {
            $sum += $cartArray["quantity"] * $productPrices[$cartArray["productId"] - 1];
        }
        echo "<br>";
    }
    echo "Sum = $sum";
} else {
    echo 'No carts found.';
}


