<?php

ini_set('display_errors',1);

class Customer{


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
            echo "connected successfully";
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


    // checking the email in the table 
    public function checkemail($email)
    {
        $sql = "SELECT count(*) as count FROM customer WHERE  email = '$email'";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0)
        {
            $check  = $result->fetch_assoc();
            return $check['count'] > 0;
        }

        return false;
    }
     
    // to store the data by using the insert query
    public function storedata($cust_name,$email,$mobile,$address,$age,$gender,$username,$password)
    {
        if($this->checkemail($email))
        {
            header("Location: customerform.php?error_message=Email already exists enter the correct email");
            exit();
        }
        else
        {
            $query = "INSERT INTO customer(cust_name,email,mobile,address,age,gender,username,password) VALUES('$cust_name','$email','$mobile','$address','$age','$gender','$username','$password')";

            if($this->conn->query($query) === TRUE)
            {   
                header("Location: customerform.php?success_message=Customer details entered successfully");
                exit();
            }
            else
            {
                header("Location: customerform.php?error_message=Filed to enter the data");
                exit();
            }
        }

    }
    
    //  posting the form data to the insert query
     
    public function postdata()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $cust_name = $_POST['cust_name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];

            $username = $_POST['username'];
            $password = $_POST['password'];

        }

        $this->storedata($cust_name,$email,$mobile,$address,$age,$gender,$username,$password);
    }
}

$customer = new Customer();
$customer->postdata();


?>




