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

        $query2 = "select * from passenger order by pass_id desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['pass_id'];
        if ($last_id == "")
        {
            $customer_ID = "PASS1";
        }
        else
        {
            $customer_ID = substr($last_id, 4);
            $customer_ID = intval($customer_ID);
            $customer_ID = "PASS" . ($customer_ID + 1);
        }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pass = $_POST['pass_id'];
$reg = $_POST['reg_id'];
$name = $_POST['passname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$phone = $_POST['phone'];

$sql="INSERT INTO `passenger`(`pass_id`, `reg_id`, `passname`, `email`, `gender`, `age`, `phone`) VALUES ('$pass','$reg','$name','$email','$gender','$age','$phone')";
 


if(!mysqli_query($conn,$sql))
{
    echo "not inserted";
}
else{
    echo "inserted";
    if($_POST['submit1'])
    {
       header('Location:home1.php');
    } 
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PASSENGER</title>
        <style>
            *{
             padding: 0;
             margin: 0;
             font-family: sans-serif;
             }

            h1{
                color: blue;
            }
            .passenger{
                width: 500px;
                line-height: 25px;
                top: 50%;
                right: 20%;
                transform: translate(-50%, -50%);
                position: absolute;
                background : white;
                border-radius: 10px;
            }

            .passenger form{
                padding: 0 40px;
                box-sizing: border-box;
            }

            .passenger input {
                font-size: 16px;
                width: 100%;
                padding: 15px 10px;
                 }

            .form .txt_field{
                margin: 50px 0;
            }

            body{
                background-color: cornflowerblue;
            }


        </style>
</head>
<body>
<div class="passenger">
        <form action='<?php echo ($_SERVER["PHP_SELF"]);?>' method="POST">
            <br>
            <h1>PASSENGER DETAILS</h1>
            <br>
            <label for="pass_id">passenger_id</label>
            <input type="text" name="pass_id" value="<?php echo $customer_ID; ?>" placeholder="passenger id" readonly>
            <br>
            <label for="reg_id">reg_id</label>
            <input type="text" name="reg_id" placeholder="registration id">
            <br>
            <label for="name">name</label>
            <input type="text" name="passname" placeholder="name">
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email">
            <br>
            <label for="gender">gender</label>
            <br>
            <input type="radio" name="gender" value="Male">Male 
            <br>
            <input type="radio" name="gender" value="Female">Female
            <br>
            <label for="age">age</label>
            <input type="number" name="age" placeholder="age">
            <br>
            <label for="phone">phone</label>
            <input type="number" name="phone" placeholder="phone number">
            <br>
            <div class="submit">
            <input type="submit" name="submit1" value="submit">
        </div>

        

</body>
</html>
