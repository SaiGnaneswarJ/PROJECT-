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

    // Retrieve all products from the database
    public function getProducts()
    {
        $sql = "SELECT * FROM payment";
        $result = $this->db->query($sql);

        $paymethods = array();

        while ($data = $result->fetch_assoc()) {
            $paymethods[] = $data;
        }

        return $paymethods;
    }
}

$payment = new Payment($conn);

$payments = $payment->getProducts();

?>


<html>
<head>
    <title>PAYMENT DETAILS</title>
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
            <h2 class="text-center">PAYMENT DETAILS</h2>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <td>ID</td>
                <td>PAYMENT METHOD</td>
            </tr>
            <?php
            foreach ($payments as $data) {
            ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['method'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
