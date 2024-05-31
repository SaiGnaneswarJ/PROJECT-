<?php
session_start();

if (isset($_SESSION['cart'])) {
    $cartCount = count($_SESSION['cart']);
    echo $cartCount;
} else {
    echo 0;
}
?>
