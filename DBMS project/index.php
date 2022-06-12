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
$email = $_POST['email'];  
$password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from register where email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
    if($count === 1){   
    if($_POST['submit1'])
    {
    header('Location:home1.php');
    } 
    }
    if($count === 0){   
    if($_POST['submit1'])
    {  
        header("Location: index.php?error=Incorrect email or password");
    }
}
   
?>

<DOCTYPE html>
    <html>
        <head>
        <title>
            METRO
        </title>
        <link href="index.css" rel="stylesheet" type="text/css">
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
                line-height: 25px;
                top: 50%;
                right: 25%;
                transform: translate(-50%, -50%);
                position: absolute;
                background : white;
                border-radius: 10px;
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
                margin: 50px 0;
            }

            .error{
                color: red;
            }

            a1{
                display : block;
                background: #00A9D4;
                color:#fff;
                padding: 30px;
                cursor:pointer;
                text-decoration:none;
                width: 400px;
                text-align: center;
                border-radius: 10px;
                font-size: 20px;
                margin: 0 200px;
            }
            .menu{
    background:cornflowerblue;
    height: 100px;
    width: 100%;
    }

.menu ul{
   float: left;
   margin-right: 5px;
      }

.menu ul li{
   display: inline-block;
   line-height: 80px;
   margin: 0 40px;
}

.btn{
   
   background-color: cornflowerblue;
}

        </style>
</head>
        <body style="background : url(metro.jpg);
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">
        <div class="main">
            <div class="navbar">
                <div class="menu">
                    <ul>
                        <li><a href="#" name="home">HOME</a><li>
                        <li><a href="Metro admin\admin1.php" name="metro">ADMIN</a><li>
        </div>

<div class="login">
        <h3>Login</h3>
        <form action='#' method="post">
            <?php
            if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } 
            ?>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="User Name" id="email" required/>
            <br>
            <br>
            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" id="password" required/>
            <br>
            <input type="submit" name="submit1" value="redirect">
            <br>
            <li><a href='register.php'>create new account</a></li>
            <br>
        </form>
        </div>

        </body>
    </html>