<?php
$conn = mysqli_connect("localhost","root","","admin");


if(!$conn)
{
    echo "not connected to server";
}

if(!mysqli_select_db($conn,'admin'))
{
    echo '';
}

function getuserdata($id){
    $array=array();
    $query=mysql_query("SELECT * FROM 'register' WHERE 'email'=".$id);
    while($r=mysql_fetch_assoc($query))
    {
        $array['email']=$row['email'];
        $array['reg_id']=$row['reg_id'];
        $array['first']=$row['first'];
        $array['last']=$row['last'];
    }
    return $array;
}






?>