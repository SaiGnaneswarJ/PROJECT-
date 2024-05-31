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

        $this->connect($servername, $user, $userpassword, $databasename);
    }
    
     // connecting to the database using database details
    public function connect($servername, $user, $userpassword, $databasename)
    {
        $this->conn = new mysqli($servername, $user, $userpassword, $databasename);

        if ($this->conn->connect_errno) {
            die("Failed to connect to database " . $this->conn->connect_error);
        }
    }
 
    // using destructor to close the database connection
    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
    
    // get the data from the database table
    public function getdata()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->conn->query($sql);

        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }

        return $result;
    }
}

$customer = new Customer();
$result = $customer->getdata();
?>

<html>
<head>
    <title>CUSTOMER DETAILS</title>
    <link rel="stylesheet" href="customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <a href="home.php" style="float:right"><button style="height:30px;width:80px;margin-right:20px">Back</button></a>
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">CUSTOMER DETAILS</h2>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Address</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Edit</td>
            </tr>
            <?php
            while ($data = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['cust_name'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['mobile'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td><?php echo $data['age'] ?></td>
                    <td><?php echo $data['gender'] ?></td>
                    <td><a href="editcustomer.php?id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
