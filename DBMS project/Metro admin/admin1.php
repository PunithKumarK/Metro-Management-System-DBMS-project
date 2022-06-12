<?php

error_reporting(0);
$conn = mysqli_connect("localhost","root","","admin");

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo '';
}
$id = $_POST['id'];  
$password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $id = stripcslashes($id);  
        $password = stripcslashes($password);  
        $id = mysqli_real_escape_string($conn, $id);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from login where id = '$id' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
if($count === 1){   
if($_POST['submit1'])
    {
    header('location:adminhome.php');
    }
    }  
    else{  
        echo "";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
        <style>
            *{
             padding: 0;
             margin: 0;
             font-family: sans-serif;
             }

            h1{
                color: blue;
            }
            .login{
                width: 400px;
                line-height: 30px;
                top: 50%;
                right: 25%;
                transform: translate(-50%, -50%);
                position: absolute;
                background : white;
                border-radius: 15px;
                background:cornflowerblue;
            }

            .login h3{
                text-align : right;
                padding: 0 0 20px 0;
                border-bottom : 1px solid silver;
            }

            .login form{
                padding: 0 40px;
                box-sizing: border-box;
            }
            .login h3{
                 font-size: 40px;
                 text-align: center;
                 text-transform: uppercase;
                 margin: 40px 0;
                  }

            .login p {
                font-size: 20px;
                margin:15px 0; 
                   }

            .login input {
                font-size: 16px;
                width: 100%;
                padding: 15px 10px;
                 }

            .form .txt_field{
                margin: 60px 0;
            }

            .error{
                color: red;
            }

        </style>
   </head>

   <body style="background : url(photom.jpg);
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">
   <div class="login">
        <h3>Admin Login</h3>
        <form action='#' method="post">
            <label for="id">ID</label>
            <input type="text" name="id" placeholder="id" id="id" required/>
            <br>
            <br>
            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" id="password" required/>
            <br>
            <br>
            <input type="submit" name="submit1" value="submit">
            <br>
        </div>
    </body>
</html>