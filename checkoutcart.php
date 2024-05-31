<?php

ini_set('display_errors', 1);

session_start();

include 'database.php';

?>

<html>
<head>
    <title>CHECKOUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
    <h1 class = "text-center text-success">CHECK OUT</h1>
    <a href="cart.php" style="float:right;margin-right:30px"><button class= "btn btn-primary">Back</button></a>
    <div class="container">
        <h2 class="mt-5" style = "text-align:right;margin-right:150px">MY CART</h2>
            <table class = "table table-bordered border-dark text-center" style = "width:500px; float:right">
                <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>SKUCODE</th>
                        <th>PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $cartItem) {
                        $totalPrice += $cartItem['price']; 
                        ?>
                        <tr>
                            <td><img src="Images/<?php echo $cartItem['image']; ?>" alt="Product Image" width="50"></td>
                            <td><?php echo $cartItem['pro_name']; ?></td>
                            <td><?php echo $cartItem['skucode']; ?></td>
                            <td>&#8377;<?php echo $cartItem['price']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="total-price" style = "margin-left:900px;float:right" >
                <table class = "table table-bordered border-dark text-center" style = "width:500px">
                    <th>TOTAL PRICE</th>
                    <td>&#8377;<?php echo $totalPrice; ?></td>
                </table>
            </div>
    </div>
</body>
</html>

