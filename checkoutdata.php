<?php
session_start();

ini_set('display_errors', 1);

include 'database.php';

class Order {
    public $conn;

    // initializing the connetion to database 
    public function __construct($conn) {
        $this->conn = $conn;
    }
     
    // inserting the orders data into to the table
    public function placeOrder($userID, $name, $email, $street, $country, $state, $city, $pincode, $mobile, $shippingMethod, $paymentMethod, $cartItems) {

        $orderID = $this->saveOrder($userID, $name, $email, $street, $country, $state, $city, $pincode, $mobile, $shippingMethod, $paymentMethod);

        if (!empty($cartItems)) {
            foreach ($cartItems as $cartItem) {

                $this->saveOrderDetail($orderID, $cartItem['id'], $cartItem['pro_name'], $cartItem['skucode'], $cartItem['price']);

            }
        }

        unset($_SESSION['cart']);

        header("Location: success.php?order_id=$orderID");
        exit();
    }
   
    // using the insert query to assign the values to insert
    public function saveOrder($userID, $name, $email, $street, $country, $state, $city, $pincode, $mobile, $shippingMethod, $paymentMethod) {


        $orderQuery = "INSERT INTO orders (user_id, name, email, street, country, state, city, pincode, mobile, shippingMethod, paymentMethod)
                       VALUES ('$userID', '$name', '$email', '$street', '$country', '$state', '$city', '$pincode', '$mobile', '$shippingMethod', '$paymentMethod')";


        $this->conn->query($orderQuery);

        return $this->conn->insert_id;
    }
      
    // saving the data of the orderdetails table
    public function saveOrderDetail($orderID, $productId, $productName, $skuCode, $price) {

        $totalPrice = $price;

        $orderDetailQuery = "INSERT INTO orderdetails (order_id, product_id, product_name, skucode, price, total_price)
                             VALUES ('$orderID', '$productId', '$productName', '$skuCode', '$price', '$totalPrice')";

        $this->conn->query($orderDetailQuery);
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {

    
    
    $userID = $_SESSION['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];
    $shippingMethod = $_POST['shippingMethod'];
    $paymentMethod = $_POST['paymentMethod'];
    $cartItems = $_SESSION['cart'];

    $order = new Order($conn);

    $order->placeOrder($userID, $name, $email, $street, $country, $state, $city, $pincode, $mobile, $shippingMethod, $paymentMethod, $cartItems);
}



?>
