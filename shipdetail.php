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

    // Retrieve all products from the database
    public function getProducts()
    {
        $sql = "SELECT * FROM shipping";
        $result = $this->db->query($sql);

        $products = array();

        while ($data = $result->fetch_assoc()) {
            $products[] = $data;
        }

        return $products;
    }
}

$ship = new Ship($conn);

$ships = $ship->getProducts();

?>


<html>
<head>
    <title>SHIPPING DETAILS</title>
    <link rel="stylesheet" href="customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        if (isset($_GET['success_message'])) {
           echo '<p class="success">' . $_GET['success_message'] . '</p>';
        }

        if (isset($_GET['error_message'])) {
            echo '<p class="error">' . $_GET['error_message'] . '</p>';
        }
    ?>
    <a href="home.php" style="float:right"><button style="height:30px;width:80px;margin-right:20px">Back</button></a>
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">SHIPPING DETAILS</h2>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <td>ID</td>
                <td>SHIPPING METHOD</td>
                <td>PRICE</td>
            </tr>
            <?php
            foreach ($ships as $data) {
            ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['shippingmethod'] ?></td>
                    <td><?php echo $data['price'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
