<?php

ini_set('display_errors', 1);

session_start();

include 'database.php';

?>

<html>
<head>
    <title>CART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
    <a href="homeproductdisplay.php" style="float:right;margin-right:30px"><button class= "btn btn-primary">Back</button></a>
    <div class="container">
        <h2 class="text-center mt-5">MY CART</h2>

        <?php
        if (empty($_SESSION['cart'])) {
           echo "<h2 style = 'color : red' >Your Cart Is Empty</h2>";
        } else {
        ?>
            <table class = "table table-bordered border-dark text-center">
                <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>SKUCODE</th>
                        <th>PRICE</th>
                        <th>ACTION</th>
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
                            <td>
                                <form method="post" action="cartitemremove.php">
                                    <input type="hidden" name="id" value="<?php echo $cartItem['id']; ?>">
                                    <button class="btn btn-danger" onclick="return showConfirmation()" type="submit" name="removeFromCart">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="total-price">
                <table class = "table table-bordered border-dark text-center">
                    <th>TOTAL PRICE</th>
                    <td>&#8377;<?php echo $totalPrice; ?></td>
                </table>
            </div>
        <?php
        }
        ?>
        <a href="checkout.php" style = "float:right"><button class="btn btn-primary mt-3">Proceed to Checkout</button></a>
        <a href="homeproductdisplay.php" style = ""><button class="btn btn-success mt-3">CONTINUE SHOPPING</button></a>
    </div>

    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to remove");
        }
    </script>
</body>
</html>

