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

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM routes WHERE metro_no='$id'");

        $items = $result->fetch_array();
        $name = $items['metro_no'];
        $route = $items['route_id'];
        $from = $items['from_route'];
        $to = $items['to_route'];
        $line = $items['lines'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['metro_no'];
    $route = $_POST['route_id'];
    $from = $_POST['from_route'];
    $to = $_POST['to_route'];
    $line = $_POST['lines'];

    $conn->query("UPDATE routes SET metro_no = '$name',route_id = '$route',from_route = '$from',to_route = '$to' WHERE metro_no='$name'") or die($conn->error);
    
}

    if($_POST['update'])
    {
       header('Location:adminhome.php');
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <h1>UPDATE DETAILS</h1>
            <br>
            <label for="metro_no">metro number</label>
            <input type="text" name="metro_no" value="<?php echo $name; ?>" placeholder="metro number">
            <br>
            <label for="route_id">route id</label>
            <input type="text" name="route_id" value="<?php echo $route; ?>" placeholder="route id">
            <br>
            <label for="departure_time">from route</label>
            <input type="text" name="from_route" value="<?php echo $from; ?>" placeholder="from route">
            <br>
            <label for="avail_seats">to route</label>
            <input type="text" name="to_route" value="<?php echo $to; ?>" placeholder="to route">
            <br>
            <label for="lines">line</label>
            <input type="text" name="lines" value="<?php echo $line; ?>" placeholder="line">
            <br>
            <br>
            <div class="submit">
            <input type="submit" name="update" value="update">
        </div>

</body>
</html>
