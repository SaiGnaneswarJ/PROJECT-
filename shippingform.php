<html>
<head>
    <title>SHIPPING FORM</title>
    <link rel="stylesheet" href="color.css">  
</head>

<body>
    <a href="home.php" style="float:right"><button style="height:30px;width:80px;margin-right:20px">Back</button></a>
    <?php
    if (isset($_GET['success_message'])) {
        echo '<p class="success">' . $_GET['success_message'] . '</p>';
    }

    if (isset($_GET['error_message'])) {
        echo '<p class="error">' . $_GET['error_message'] . '</p>';
    }
    ?>
    <h1>SHIPPING METHOD</h1>
    <form action ="shipdata.php" name="register" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="shipname">
            <label >SHIPPING METHOD:</label> <br>
            <input type="text" name="shippingmethod" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="price">
            <label > PRICE:</label><br>
            <input type="text" name="price" ><br><b><span class="formerror"> </span></b>
        </div>

        <input class="but" type="submit" value="Submit">
        <button class="but"><a href="shippingform.php">Reload</a></button><br><br>

    </form>
</body>
<script src="shipvalid.js"></script>

</html>