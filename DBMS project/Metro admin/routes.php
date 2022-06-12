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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$metro = $_POST['metro_no'];
$route = $_POST['route_id'];
$from = $_POST['from_route'];
$to = $_POST['to_route'];
$line = $_POST['lines'];

$sql="INSERT INTO `routes`(`metro_no`, `route_id`, `from_route`, `to_route`,`lines`) VALUES ('$metro','$route','$from','$to','$line')";

if(!mysqli_query($conn,$sql))
{
    echo "not inserted";
}
else{
    echo "inserted";
    if($_POST['submit1'])
    {
       header('Location:adminhome.php');
    } 
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ROUTE</title>
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
        <form action='#' method="post">
            <br>
            <h1>UPDATE ROUTE DETAILS</h1>
            <br>
            <label for="metro_no">metro number</label>
            <input type="text" name="metro_no" placeholder="metro number">
            <br>
            <label for="route_id">route id</label>
            <input type="text" name="route_id" placeholder="route id">
            <br>
            <label for="departure_time">from route</label>
            <input type="text" name="from_route" placeholder="from route">
            <br>
            <label for="avail_seats">to route</label>
            <input type="text" name="to_route" placeholder="to route">
            <br>
            <label for="lines">Line</label>
            <input type="text" name="lines" placeholder="Line">
            <br>
            <br>
            <div class="submit">
            <input type="submit" name="submit1" value="submit">
        </div>

</body>
</html>
