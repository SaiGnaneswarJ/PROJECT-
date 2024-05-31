<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location: page.php");
}

?>

<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <a href="logout.php" style = "float:right" onclick="return showConfirmation()"><button style = " height:30px;width:80px;background-color:red;">Logout</button></a>
    <h1>Welcome,  <?php  echo $_SESSION['fname']; ?></h1>
    <header>

        <!-- <a href="customerform.php"><button style = "background-color:green;height:50px;width:300px">CUSTOMER REGISTRATION</button></a><br><br>
        <a href="customerdetail.php"><button style = "background-color:yellow;height:50px;width:300px">CUSTOMER DETAILS</button></a><br><br> -->
        <a href="productform.php"><button style = "background-color:grey;height:50px;width:300px">PRODUCT REGISTRATION</button></a><br><br>
        <a href="productdetail.php"><button style = "background-color:orange;height:50px;width:300px">PRODUCT DETAILS</button></a><br><br>
        <a href="shippingform.php"><button style = "background-color:red;height:50px;width:300px">SHIPMETHOD REGISTRATION</button></a><br><br>
        <a href="shipdetail.php"><button style = "background-color:violet;height:50px;width:300px">SHIPMETHOD DETAILS</button></a><br><br>
        <a href="paymentform.php"><button style = "background-color:green;height:50px;width:300px">PAYMETHOD REGISTRATION</button></a><br><br>
        <a href="paymentdetail.php"><button style = "background-color:blue;height:50px;width:300px">PAYMETHOD DETAILS</button></a><br><br>
     
    </header>
    
    <!-- <p><?php echo $_SESSION['id']; ?></p> -->
    <!-- <h3>FIRST NAME :</h3>
    <p><?php echo $_SESSION['fname']; ?></p>
    <h3>LAST NAME:</h3>
    <p><?php echo $_SESSION['lname']; ?></p>
    <h3>EMAIL :</h3>
    <p><?php echo $_SESSION['email']; ?></p>
    <h3>USER NAME:</h3>
    <p><?php echo $_SESSION['username']; ?></p>
    <h3>PASSWORD :</h3>
    <p><?php echo $_SESSION['password']; ?></p> -->

    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to logout");
        }
    </script>
</body>
</html>
