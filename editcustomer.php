<?php
ini_set('display_errors', 1);

class Customer
{
    public $conn;
     
     // initialize the connection for database
    public function __construct()
    {
        $servername = "localhost";
        $user = "saignaneswarj";
        $userpassword = "Gnaneswar@2002";
        $databasename = "Project";

        $this->connect($servername,$user,$userpassword,$databasename);
    }
    
    // connecting to the database using database details
    public function connect($servername,$user,$userpassword,$databasename)
    {
        $this->conn = new mysqli($servername,$user,$userpassword,$databasename);

        if($this->conn->connect_errno)
        {
            echo "Failed connect to database " . $this->conn -> connect_error;
        }
        else{
            // echo "connected successfully";
        }
    }
     
    // using destructor to close the database connection
    public function __destruct()
    {
        if($this->conn)
        {
            $this->conn-> close();
        }
    }

    // get the data by id from the database table
    public function getdatabyid($id)
    {
        $sql = "SELECT * FROM customer WHERE id = $id";
        $result = $this->conn->query($sql);

        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }

        return $result->fetch_assoc();
    }

    // update the details of the table by using update query
    public function updatedata($id, $name, $email, $mobile, $address, $age, $gender)
    {
        $sql = "UPDATE customer SET cust_name='$name', email='$email', mobile='$mobile', address='$address', age='$age', gender='$gender' WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            die("Error updating record: " . $this->conn->error);
        }
    }
}

$customer = new Customer();

// posting the updated details to database
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['cust_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    if ($customer->updatedata($id, $name, $email, $mobile, $address, $age, $gender)) {
        header("Location: customerdetail.php?success_message=Customer details updated successfully");
        exit();
    }
}

// getting the data by id 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $customer->getdatabyid($id);
} else {
    header("Location: home.php");
    exit();
}


?>

<html>
<head>
    <title>CUSTOMER DETAILS</title>
    <link rel="stylesheet" href="customer.css">  
</head>
<body>
    <a href="customerdetail.php" style="float:right"><button style="height:30px;width:80px;">Back</button></a>
    <h1>CUSTOMER DETAILS</h1>
      
    <form action="editcustomer.php" name="register" onsubmit="return validateForm()" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"> 
        <div class="formdesign" id="cust_name">
            <label>Customer Name:</label> <br>
            <input type="text" name="cust_name" value="<?php echo $data['cust_name']; ?>" ><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="email">
            <label>Email:</label><br>
            <input type="text" name="email" value="<?php echo $data['email']; ?>" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="mobile">
            <label>Mobile:</label>  <br>
            <input type="tel" name="mobile" value="<?php echo $data['mobile']; ?>" ><br><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="address">
            <label>Address:</label> <br>
            <input type="text" name="address" value="<?php echo $data['address']; ?>" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="age">
            <label>Age:</label><br>
            <input type="number" name="age" value="<?php echo $data['age']; ?>" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="gender">
            <label>Gender:</label><br>
            <select class="gender" name="gender" >
                <option value="Male" <?php if ($data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select><br><b><span class="formerror"> </span></b>
        </div><br>
        <input type="submit" name="update" value="Update" class="but" onclick="return showConfirmation()">
    </form>

    <script src="customervalid.js"></script>
    <script>
        function showConfirmation() {
            return confirm("Are you sure you want to update?");
        }
    </script>
</body>
</html>
