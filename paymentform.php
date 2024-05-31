<html>
<head>
    <title>PAYMENT FORM</title>
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
    <h1>PAYMENT METHOD</h1>
    <form action="paymentdata.php" name="pay" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="payment">
            <label>PAYMENT METHOD:</label> <br>
            <input type="text" name="method"><br><b><span class="formerror"></span></b>
        </div>
        <input class="but" type="submit" value="Submit">
        <button class="but"><a href="paymentform.php">Reload</a></button><br><br>

    </form>
    
    <script src="payvalid.js"></scrpit>
</body>
</html>

