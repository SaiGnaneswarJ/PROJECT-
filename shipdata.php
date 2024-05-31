<?php
ini_set('display_errors', 1);

include 'database.php';

class Ship
{
    private $db;
    
    // initializing and connecting to the database
    public function __construct($db)
    {
        $this->db = $db;
    }
     
    // query to check the sku code and also query to insert the product details
    public function insertProduct($shippingmethod, $price)
    {
        $sql = "INSERT INTO shipping (shippingmethod, price) VALUES ('$shippingmethod', $price)";

        if ($this->db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shippingmethod = $_POST['shippingmethod'];
    $price = $_POST['price'];

    $ship = new Ship($conn);

    if ($ship->insertProduct($shippingmethod, $price)) {
        header("Location: productform.php?success_message=Product inserted successfully");
        exit();
    } else {
        header("Location: productform.php?error_message=Error inserting product");
        exit();
    }
}
?>
