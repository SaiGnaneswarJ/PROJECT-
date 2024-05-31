<?php
ini_set('display_errors', 1);
include 'database.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: customerlogin.php");
}

class Product
{
    private $db;
 

    //initialize the connection to the database
    public function __construct($db)
    {
        $this->db = $db;
    }
 
    // get the product details from the database table

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        $products = array();

        while ($data = $result->fetch_assoc()) {
            $products[] = $data;
        }

        return $products;
    }
}

$product = new Product($conn);
$Products = $product->getProducts();
?>

<html>
<head>
    <title>PRODUCTS</title>
    <link rel="stylesheet" href="customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .product-row {
            display: inline-block;
            text-align: center;
            width: 300px;
            margin: 10px;
            margin-top:50px;
        }
        img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>

<body>
    <header>
        <a href="customerlogout.php" style="float:right" onclick="return showConfirmation()">
            <button style="height:30px;width:80px;background-color:red;">Logout</button>
        </a>
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
    </header>
    <div style="margin-top:20px">
        <a href="cart.php">
            <button class="btn btn-primary" style="float:right;">
                <h5 id="cartIcon"><i class="bi bi-cart4"></i></h5>
            </button>
        </a>
    </div>
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">PRODUCTS</h2>
        </div>
        <?php foreach ($Products as $data) { ?>
            <div class="product-row">
                <table class="table table-bordered text-center">
                    <tr>
                        <p>IMAGE</p>
                        <p><img src="Images/<?php echo $data['image']; ?>" alt="Product Image" width="50"></p>
                    </tr>
                    <tr>
                        <td>SKUCODE</td>
                        <td><?php echo $data['skucode'] ?></td>
                    </tr>
                    <tr>
                        <td>PRODUCT NAME</td>
                        <td><?php echo $data['pro_name'] ?></td>
                    </tr>
                    <tr>
                        <td>PRICE</td>
                        <td>&#8377;<?php echo $data['price'] ?></td>
                    </tr>
                </table>
                <form method="post" class="addToCartForm">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <button class="btn btn-success" type="submit" name="addToCart">ADD TO CART</button>
                </form>
            </div>
        <?php } ?>
    </div>

    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to logout");
        }

        $(document).ready(function () {
            $('.addToCartForm').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "addtocart.php",
                    data: formData,
                    success: function (response) {
                        console.log(response);

                        // Update the cart count on the page
                        $.ajax({
                            type: "GET",
                            url: "cartcount.php",
                            success: function (cartCount) {
                                $('#cartIcon').html('<i class="bi bi-cart4"></i> (' + cartCount + ')');
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

</body>
</html>
