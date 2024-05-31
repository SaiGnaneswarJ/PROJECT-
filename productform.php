<html>
<head>
    <title>REGISTER PRODUCT </title>
    <link rel="stylesheet" href="customer.css">  
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
    <a href="home.php" style="float:right"><button style="height:30px;width:80px">Back</button></a>
    <h1>REGISTER PRODUCT</h1>
      
    <form action="productdata.php" name="register" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
        <div class="formdesign" id="skucode">
            <label >SKU CODE:</label> <br>
            <input type="text" name="skucode" ><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="pro_name">
            <label > PRODUCT NAME:</label><br>
            <input type="text" name="pro_name" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="price">
            <label > PRICE:</label>  <br>
            <input type="text" name="price" ><br><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="image">
            <label >IMAGE:</label> <br>
            <input type="file" name="image" accept="image/*"><br><b><span class="formerror"> </span></b>
        </div>

        <input class="but" type="submit" value="Submit">
        <button class="but"><a href="productform.php">Reset</a></button>
    </form>


    <script src="productvalid.js"></script>
</body>
</html>
