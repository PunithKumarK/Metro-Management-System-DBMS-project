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
        $query2 = "select * from booking order by token_no desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['token_no'];
        if ($last_id == "")
        {
            $customer_ID = "CUS1";
        }
        else
        {
            $customer_ID = substr($last_id, 3);
            $customer_ID = intval($customer_ID);
            $customer_ID = "CUS" . ($customer_ID + 1);
        }
    ?>
<?php
        $conn = mysqli_connect("localhost","root","","admin");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $token_no = $_POST['token_no'];
            $pass_id = $_POST['pass_id'];
            $metro_no = $_POST['metro_no'];
            $from = $_POST['from_route'];
            $to = $_POST['to_route'];
            $route_id = $_POST['date'];
            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql="INSERT INTO `booking`(`token_no`, `pass_id`, `metro_no`, `from_route`, `to_route`, `date`) VALUES ('$token_no','$pass_id','$metro_no','$from','$to','$route_id')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                if($_POST['submit1'])
                {
                header('Location:home1.php');
                } 
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
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
                width: 600px;
                line-height: 25px;
                top: 50%;
                right: 15%;
                transform: translate(-50%, -50%);
                position: absolute;
                background : white;
                border-radius: 15px;
            }
            .passenger form{
                padding: 0 50px;
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


        <script>
            function lselect()
            {
                var d=document.getElementById("fromroute");
                var displaytext=d.options[d.selectedIndex].text;
                document.getElementById("fromvalue").value=displaytext;
            }

            function rselect()
            {
                var d=document.getElementById("toroute");
                var displaytext=d.options[d.selectedIndex].text;
                document.getElementById("tovalue").value=displaytext;
            }

            function xselect()
            {
                var d=document.getElementById("metrono");
                var displaytext=d.options[d.selectedIndex].text;
                document.getElementById("novalue").value=displaytext;
            }

            function yselect()
            {
                var d=document.getElementById("routeid");
                var displaytext=d.options[d.selectedIndex].text;
                document.getElementById("idvalue").value=displaytext;
            }
        </script>
</head>
<body>
<div class="passenger">
<div class="row">
        <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">
            <br>
            <h1>BOOK METRO</h1>
            <br>
            <label for="token_no">token_no</label>
            <input type="text" name="token_no" placeholder="token no" id="token_no" style="color: red" value="<?php echo $customer_ID; ?>">
            <br>
            <label for="pass_id">passenger_id</label>
            <input type="text" name="pass_id" placeholder="passenger id">
            <br>
            <label for="from_route">from</label>
            <select id="fromroute" onchange="lselect()">
                <option>--select--</option>
                <option>Lalbagh</option>
        </select>
        <br>
        <input type="text" id="fromvalue" name="from_route"/>
            <br>
            <label for="to_route">to</label>
            <select id="toroute" onchange="rselect()">
                <option>--select--</option>
                <option>Trinity</option>
                <option>Cubbon Park</option>
                <option>Chickpet</option>
                <option>Dasarahalli</option>
                <option>Kuvempu Road</option>
        </select>
        <br>
        <input type="text" id="tovalue" name="to_route"/>
            <br>
            </select>
            <br>
            <label for="metro_no">metro no</label>
            <select id="metrono" onchange="xselect()">
                <option>--select--</option>
                <option>M3132 (Lalbagh-Trinity)</option>
                <option>M6352 (Lalbagh-Cubbon Park)</option>
                <option>M2156 (Lalbagh-Chickpet)</option>
                <option>M7362 (Lalbagh-Dasarahalli)</option>
                <option>M8292 (Lalbagh-Kuvempu Road)</option>

                <br>
              <input type="text" id="novalue" name="metro_no"/>
            <br>
            <br>
            <label for="date">date</label>
            <br>
            Note : Please select the date of your journey
            <input type="date" name="date">
            <br>
            <br>
            <div class="submit">
            <input type="submit" name="submit1" value="submit">
        </div>
</body>
</html>
