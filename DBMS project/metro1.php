<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>
            METRO
    </title>
    <style>
                * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: $font-family;
    font-size: $font-size;
    background-size: 200% 100% !important;
    transform: translate3d(0, 0, 0);
    background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);
    height: 100vh
}

            </style>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <form action="" method="GET">
                              <div class="input-group mb-3">
                                   <input label="search" type="text" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];}?>" class='form-control' placeholder="search by id" value="">
                                   <button type="submit" class="btn btn-primary">search</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>metro number</th>
                                    <th>arrival time</th>
                                    <th>departure time</th>
                                    <th>Line</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$conn=mysqli_connect("localhost","root","","admin");

if(isset($_GET['search']))
{
    $filtervalues=$_GET['search'];
    $query="SELECT * FROM metro_details WHERE CONCAT(metro_no) like '%$filtervalues%'";
    $query_run=mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $items)
        {
            ?>
            <tr>
            <td><?=$items['metro_no'];?></td>
            <td><?=$items['arr_time'];?></td>
            <td><?=$items['dep_time'];?></td>
            <td><?=$items['lines'];?></td>
            </tr>
            <?php
        }
    }
    else
    {
        ?>
        <tr>
            <td colspan="3">no record found</td>
        </tr>

        <?php
    }
}
?>
                                <tr>
                                    <td></td>
                                </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

