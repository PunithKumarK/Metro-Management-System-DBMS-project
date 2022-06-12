<?php

$conn = mysqli_connect("localhost","root","","admin");

$id = 0;

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo 'database not selected';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$metro = $_POST['metro_no'];
$atime = $_POST['arr_time'];
$dtime = $_POST['dep_time'];
$line = $_POST['lines'];


$sql="INSERT INTO `metro_details`(`metro_no`,`arr_time`,`dep_time`,`lines`) VALUES ('$metro','$atime','$dtime','$line')";

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
        <form action='#' method="post">
            <br>
            <h1>UPDATE DETAILS</h1>
            <br>
            <label for="metro_no">metro number</label>
            <input type="text" name="metro_no" placeholder="metro number">
            <br>
            <label for="arrival_time">arrival time</label>
            <input type="time" name="arr_time" placeholder="arrival time">
            <br>
            <label for="departure_time">departure time</label>
            <input type="time" name="dep_time" placeholder="departure time">
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
