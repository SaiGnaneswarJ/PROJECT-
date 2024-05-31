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

    // Getting a product from the database by id
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Update product details in the database
    public function updateProduct($id, $skucode, $pro_name, $price, $image)
    {
        $sql = "UPDATE products SET skucode='$skucode', pro_name='$pro_name', price=$price, image='$image' WHERE id=$id";
        return $this->db->query($sql);
    }
}

// get the data by the id
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = new Product($conn);
    $productData = $product->getProductById($productId);
    if (!$productData) {
        echo "Product not found!";
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}

// posting the update values to database
if (isset($_POST['update'])) {
    $skucode = $_POST['skucode'];
    $pro_name = $_POST['pro_name'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = '/var/www/html/project/Images/' . $image;

    if (move_uploaded_file($tempfile, $folder)) {

        $product = new Product($conn);

        $updateResult = $product->updateProduct($productId, $skucode, $pro_name, $price, $image);

        if ($updateResult) {
            header("Location: productdetail.php?success_message=Product edited successfully");
            exit();
        } else {
            echo "Error updating product!";
            exit;
        }
    }

}
?>


<html>
<head>
    <title>EDIT PRODUCT </title>
    <link rel="stylesheet" href="customer.css">  
</head>
<body>
    <h1>EDIT PRODUCT</h1>
    <form action="editproduct.php?id=<?php echo $productId; ?>" name="register" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
        <div class="formdesign" id="skucode">
            <label >SKU CODE:</label> <br>
            <input type="text" name="skucode" value="<?php echo $productData['skucode']; ?>"><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="pro_name">
            <label > PRODUCT NAME:</label><br>
            <input type="text" name="pro_name" value="<?php echo $productData['pro_name']; ?>"><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="price">
            <label > PRICE:</label>  <br>
            <input type="text" name="price" value="<?php echo $productData['price']; ?>"><br><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="image">
            <label >IMAGE:</label> <br>
            <img src="Images/<?php echo $productData['image']; ?>" alt="Product Image" width="50"><br>
            <input type="file" name="image" accept="image/*"><br><b><span class="formerror"> </span></b>
        </div>

        <input class="but" type="submit" name = "update" onclick="return showConfirmation()">
        <button class="but"><a href="productdetail.php">Back</a></button>
    </form>

    <script src="productvalid.js"></script>
    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to update?");
        }
    </script>
</body>
</html>
