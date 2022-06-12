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

$query = "DELETE FROM booking WHERE token_no='$id'";

$query_run = mysqli_query($conn, $query);

if($query_run)
{
    ?>
    <script> 
    alert("Data Deleted"); 
    </script>
    <?php
    header("Location:adminbookingdetails.php");
}
else
{
    ?>
    <script> alert("Data Not Deleted"); </script>
    <?php
}

?>