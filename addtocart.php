<?php
session_start();

ini_set('display_errors', 1);
include 'database.php';

if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    $productDetails = $result->fetch_assoc();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $productDetails;

    // Return a success message or any data you want to handle in the Ajax response
    echo "Product added to cart successfully";
} else {
    
    echo "Invalid request";
}

?>
