<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","admin");

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo 'database not selected';
}

?>
<?php
        $query2 = "select * from register order by reg_id desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['reg_id'];
        if ($last_id == "")
        {
            $customer_ID = "REGR1";
        }
        else
        {
            $customer_ID = substr($last_id, 4);
            $customer_ID = intval($customer_ID);
            $customer_ID = "REGR" . ($customer_ID + 1);
        }
    ?>
 
<?php
        $conn = mysqli_connect("localhost","root","","admin");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reg = $_POST['reg_id'];
            $name = $_POST['first'];
            $name1 = $_POST['last'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $pass1 = $_POST['passwordc'];
            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
            $sql="INSERT INTO `register`(`reg_id`, `first`, `last`, `email`, `password`, `passwordc`) VALUES ('$reg','$name','$name1','$email','$pass','$pass1')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                if($_POST['submit1'])
                 {
                 header('Location:index.php');
                 } 
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>REGISTER</title>

        <style>
            *{
             padding: 0;
             margin: 0;
             font-family: sans-serif;
             }

            h1{
                color: blue;
            }
            .register{
                width: 400px;
                line-height: 25px;
                top: 50%;
                right: 25%;
                transform: translate(-50%, -50%);
                position: absolute;
                background : white;
                border-radius: 10px;
            }

            .register h1{
                text-align : right;
                padding: 0 0 20px 0;
                border-bottom : 1px solid silver;
            }

            .register form{
                padding: 0 40px;
                box-sizing: border-box;
            }
            .register h1{
                 font-size: 40px;
                 text-align: center;
                 text-transform: uppercase;
                 margin: 40px 0;
                  }

            .register input {
                font-size: 16px;
                width: 100%;
                padding: 15px 10px;
                 }

            .form .txt_field{
                margin: 50px 0;
            }

            .error{
                color: red;
            }

            .submit{
                color: #ffff;
                
            }

        </style>
    </head>
    <body>
        <div class="register">
        <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
            <br>
            <h1>REGISTER</h1>
            <br>
            <label for="reg_id">register_id</label>
            <input type="text" name="reg_id" id="reg_id" placeholder="register id" value="<?php echo $customer_ID; ?>" readonly>
            <br>
            <label for="first">First Name</label>
            <input type="text" name="first" placeholder="first name">
            <br>
            <label for="last">Last Name</label>
            <input type="text" name="last" placeholder="Last name">
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">
            <br>
            <label for="passwordc">Confirm Password</label>
            <input type="password" name="passwordc" placeholder="confirm password">
            <br>
            <br>
            <div class="submit">
            <input type="submit" name="submit1" value="submit">
        </div>
        </div>
        </form>


    </body>



</html>