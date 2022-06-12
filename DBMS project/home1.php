<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>metro</title>
        <style>
            *{
             padding: 0;
             margin: 0;
             font-family: sans-serif;
             }
             .button a{
                display : block;
                background: #00A9D4;
                color:#fff;
                padding:30px;
                cursor:pointer;
                text-decoration:none;
                width: 400px;
                text-align: center;
                border-radius: 10px;
                font-size: 25px;
                margin: 0 500px;
            }
            .update{
                margin : 0 500px;
            }

            .menu{
                 background:cornflowerblue;
                 height: 100px;
                 width: 100%;
                 }

            .menu ul{
                 float: left;
                 margin-right: 10px;
                 }

            .menu ul li{
                display: inline-block;
                line-height: 80px;
                margin: 0 55px;
                  }

            .btn{
                 background-color: cornflowerblue;
                }
        </style>

   </head>
   <script src="alert.js"></script>
   <body style="background : url(metro.jpg);
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">
    <div class="main">
            <div class="navbar">
                <div class="menu">
                    <ul>
                        <li><a href="#" name="home">HOME</a><li>
                        <li><a href="passenger.php" name="metro">UPDATE MY DETAILS</a><li>
                        <?php
                          $conn=mysqli_connect("localhost","root","","admin");
                          $query="SELECT * FROM passenger";
                          $query_run=mysqli_query($conn,$query);
                         if(mysqli_num_rows($query_run)>0)
                         {
                         foreach($query_run as $items)
                         {
                          $itemid = $items['reg_id'];
                         }
                          ?>
                        <li><a href="passengerprofile.php?id=<?php echo $itemid; ?>" data-toggle="
            tooltip" data-placement="bottom" title="PROFILE" id="profile"> <i class="fa fa-trash" aria-hidden="true">PROFILE</i> </a></li>
                         <?php }
                         ?>
        </div>
        </div>
        </div>
        <div class="button"><br><br>
        <a href="bookmetro.php" METRO>BOOKING </a><br><br>
        <a href="bookingdetails.php" name="book">BOOKING DETAILS </a><br><br>
        <a href="metro1.php" METRO>METRO DETAILS </a><br><br>
        <a href="routedetails.php" ROUTE>ROUTE DETAILS </a>
        </div>
   </body>
</html>
