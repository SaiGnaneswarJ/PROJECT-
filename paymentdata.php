<?php
ini_set('display_errors', 1);

include 'database.php';

class Payment
{
    private $db;
    
    // initializing and connecting to the database
    public function __construct($db)
    {
        $this->db = $db;
    }
     
    // query to check the sku code and also query to insert the product details
    public function insertProduct($method)
    {
        $sql = "INSERT INTO payment (method) VALUES ('$method')";

        if ($this->db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];

    $payment = new Payment($conn);

    if ($payment->insertProduct($method)) {
        header("Location: paymentform.php?success_message=Payment method inserted successfully");
        exit();
    } else {
        header("Location: paymentform.php?error_message=Error inserting Payment method");
        exit();
    }
}
?>
