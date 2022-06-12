<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","admin");

$update = false;

$id = 0;

$pass='';
$reg = '';
$name = '';
$email = '';
$gender = '';
$age = '';
$phone = '';

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo 'database not selected';
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM passenger WHERE pass_id='$id'");

        $items = $result->fetch_array();
        $pass_id = $items['pass_id'];
        $reg = $items['reg_id'];
        $name = $items['passname'];
        $email = $items['email'];
        $gender = $items['gender'];
        $age = $items['age'];
        $phone = $items['phone'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $pass = $_POST['pass_id'];
    $reg = $_POST['reg_id'];
    $name = $_POST['passname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    $conn->query("UPDATE passenger SET passname = '$name' , email = '$email' , gender='$gender' , age='$age' , phone='$phone' WHERE pass_id='$pass'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:adminhome.php');
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

        <form action='#' method="POST">
            <br>
            <h1>UPDATE PASSENGER DETAILS</h1>
            <br>
            <label for="pass_id">passenger_id</label>
            <input type="text" name="pass_id" placeholder="passenger id" value="<?php echo $items['pass_id'];?>">
            <br>
            <label for="reg_id">reg_id</label>
            <input type="text" name="reg_id" placeholder="registration id" value="<?php echo $items['reg_id'];?>">
            <br>
            <label for="name">name</label>
            <input type="text" name="passname" placeholder="name" value="<?php echo $items['passname'];?>">
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email" value="<?php echo $items['email'];?>">
            <br>
            <label for="gender">gender</label>
            <br>
            <input type="radio" name="gender" value="Male" value="<?php echo $items['gender'];?>">Male 
            <br>
            <input type="radio" name="gender" value="Female" value="<?php echo $items['gender'];?>">Female
            <br>
            <label for="age">age</label>
            <input type="number" name="age" placeholder="age" value="<?php echo $items['age'];?>">
            <br>
            <label for="phone">phone</label>
            <input type="number" name="phone" placeholder="phone number" value="<?php echo $items['phone'];?>">
            <br>
            <div class="submit">
            <input type="submit" name="update" value="submit">
        </div>

        

</body>
</html>
