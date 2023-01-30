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
        <form action="adddata_db.php" method="post" onsubmit="return handleFormSubmit();">
            <div class="form-group">
                <label>Type of Fabric</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="/image/addiocn.jpg" width="30px"></span>
                        <input name="data_name" placeholder="INTEL Duvet cover King 6.5ft...." class="form-control"
                            type="text" required minlength="3" maxlength="50">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <form action="color_db.php" method="post">
                <div class="form-group">
                <label>Color</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="/image/addiocn.jpg" width="30px"></span>
                        <input name="color" placeholder="Black" class="form-control" type="text" required
                            minlength="3" maxlength="50">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

            <div class="move_r">
            <p> example </p>
            <img src="/image/view_.png" width="300px">
        </div>
            <script>
                function handleFormSubmit() {
                    var input = document.getElementById("data_name").value;
                    var input2 = document.getElementById("data_name").value;
                    if (input.length > 50 || input2.length > 50) {
                        alert("Can't input more than 50 characters!");
                        return false;
                    } else {
                        //form submission code here
                    }
                }
            </script>



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
                <th>#</th>
                <th>data</th>
                <th>Time</th>
            </tr>";
        while ($row = $result_->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["data_name"] . "</td>
                <td>" . $row["time_add"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn = null;
    ?>
     <br>
    <h1>Details Color</h1>
    <?php // Select all records from table
    $sql_color = "SELECT * FROM color_data";
    $result_color = $con->query($sql_color);

    if ($result_color->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>#</th>
                <th>Color</th>
                <th>Time</th>
            </tr>";
        while ($row_color = $result_color->fetch_assoc()) {
            echo "<tr>
                <td>" . $row_color["id"] . "</td>
                <td>" . $row_color["color"] . "</td>
                <td>" . $row_color["time_add"] . "</td>
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