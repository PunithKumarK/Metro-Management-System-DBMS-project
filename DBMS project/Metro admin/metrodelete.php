<?php
$conn = mysqli_connect("localhost","root","","admin");

if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo 'database not selected';
}


$id = $_GET['id'];

$query = "DELETE FROM metro_details WHERE metro_no='$id'";

$query_run = mysqli_query($conn, $query);

if($query_run)
{
    ?>
    <script> 
    alert("Data Deleted"); 
    </script>
    <?php
    header("Location:metrodetails.php");
}
else
{
    ?>
    <script> alert("Data Not Deleted"); </script>
    <?php
}

?>