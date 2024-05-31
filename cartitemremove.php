<?php

ini_set('display_errors', 1);

session_start();

include 'database.php';


if (isset($_POST['removeFromCart'])) {
    $productId = $_POST['id'];

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }

    header("Location: cart.php?success_message=Product removed from cart");
    exit();
}


?>