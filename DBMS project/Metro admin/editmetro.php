<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","admin");

$update = false;

$id = 0;

$name = '';
$arrt = '';
$dept = '';
$avail = '';

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

    $result = $conn->query("SELECT * FROM metro_details WHERE metro_no='$id'");

        $items = $result->fetch_array();
        $name = $items['metro_no'];
        $arrt = $items['arr_time'];
        $dept = $items['dep_time'];
        $avail = $items['lines'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['metro_no'];
    $arrt = $_POST['arr_time'];
    $dept = $_POST['dep_time'];
    $avail = $_POST['lines'];

    $conn->query("UPDATE metro_details SET arr_time = '$arrt' , dep_time = '$dept' WHERE metro_no='$name'") or die($conn->error);
    
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
        <form action='#' method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <h1>UPDATE DETAILS</h1>
            <br>
            <label for="metro_no">metro number</label>
            <input type="text" name="metro_no" value="<?php echo $name; ?>" placeholder="metro number" >
            <br>
            <label for="arrival_time">arrival time</label>
            <input type="time" name="arr_time" value="<?php echo $arrt; ?>" placeholder="arrival time">
            <br>
            <label for="departure_time">departure time</label>
            <input type="time" name="dep_time" value="<?php echo $dept; ?>" placeholder="departure time">
            <br>
            <label for="lines">Line</label>
            <input type="text" name="lines" value="<?php echo $avail; ?>"  placeholder="metro line">
            <br>
            <br>
            <div class="submit">
                
            <input type="submit" class= "btn btn-primary" name="update" value="update">
            
        </div>

</body>
</html>
