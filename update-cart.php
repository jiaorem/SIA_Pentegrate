<?php

include ("init.php");
use Models\Cart;

try {
    $product_id = $_POST['product_id'];
    $cart_item_quantity = $_POST['cart_item_quantity'];
    $product_price = $_POST['product_price'];

    $newprice = $cart_item_quantity * $product_price;

    $carts = new Cart('', '', '','');
    $carts->setConnection($connection);
    $carts->updateCart($product_id, $cart_item_quantity, $newprice);

    header("Location: cart.php");
    exit();
} catch (Exception $e) {
    echo "<script>window.location.href='index.php?error='" . $e->getMessage() . ";</script>";
    exit();
}



