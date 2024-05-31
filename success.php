<html>
<head>
    <title>ORDER PLACED</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mt-5">
    <a href="homeproductdisplay.php" style="float:right;margin-right:30px" onclick="return showConfirmation()"><button class="btn btn-primary">Back</button></a>
    <h2 class="text-success text-center" style = "margin-left:30px">Your Order has been placed</h2>
    <h3 class="text-success text-center" style = "margin-right:15px">Thank you for the order</h3>

    <?php
    

    if (isset($_GET['order_id'])) {
        $orderId = $_GET['order_id'];
        echo "<p class='text-center text-danger'>Your Order ID: $orderId</p>";
    }

    ?>
    
    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to go for homepage!");
        }
    </script>
</body>
</html>

