<?php
ini_set('display_errors', 1);

include 'database.php';

class Product
{
    private $db;
    
    // initializing and connecting to the database
    public function __construct($db)
    {
        $this->db = $db;
    }
     
    // query to check the sku code and also query to insert the product details
    public function insertProduct($skucode, $pro_name, $price, $image)
    {
        $checkSql = "SELECT skucode FROM products WHERE skucode = '$skucode'";
        $result = $this->db->query($checkSql);

        if ($result->num_rows > 0) {
            return false;
        } else {
            $sql = "INSERT INTO products (skucode, pro_name, price, image) VALUES ('$skucode', '$pro_name', $price, '$image')";

            if ($this->db->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skucode = $_POST['skucode'];
    $pro_name = $_POST['pro_name'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = '/var/www/html/project/Images/' . $image;
  
    $product = new Product($conn);

    if ($product->insertProduct($skucode, $pro_name, $price, $image)) {
        header("Location: productform.php?success_message=Product inserted successfully");
        exit();
    } else {
        header("Location: productform.php?error_message=SKU code already exists");
        exit();
    }
}
?>
