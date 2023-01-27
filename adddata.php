<?php session_start();
include('server.php');
if ($_SESSION['id'] != "") { ?>
    <!DOCTYPE html>
    <html en>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="Stylesheet" href="/css/back.css">
        <link rel="Stylesheet" href="/css/add.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="/css/back.css">
        <link rel="Stylesheet" href="/css/add.css">
        <link rel="Stylesheet" href="/css/table.css">
        <title>Laundry Register </title>
    </head>

    <body>
        <div><a href="home.php"><img src="/image/back.png" class="btn_back" width="30px"></a>
            <h1>Add Your Data</h1>
        </div>
        <form action="adddata_db.php" method="post">
            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="/image/addiocn.jpg" width="30px"></span>
                        <input name="data_name" placeholder="INTEL Duvet cover King 6.5ft...." class="form-control"
                            type="text" required minlength="3">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
        </script>
    <?php } else {
    echo "<script>";
    echo "window.location.href='index.php';";
    echo "</script>";
} ?>
    <br>
    <br>
        <h1>Details Item</h1>
       <?php // Select all records from table
    $sql = "SELECT * FROM data";
    $result_ = $con->query($sql);

    if ($result_->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>id</th>
                <th>data_name</th>
                <th>created_at</th>
            </tr>";
        while($row = $result_->fetch_assoc()) {
            echo "<tr>
                <td>". $row["id"] ."</td>
                <td>". $row["data_name"] ."</td>
                <td>". $row["created_at"] ."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }


    $con->close();
?>
</div>
</body>

</html>