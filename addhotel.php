<?php session_start();
if ($_SESSION['id'] != "") { ?>
<!DOCTYPE html>
<html en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/back.css">
        <link rel="Stylesheet" href="/css/add.css">
        <link rel="Stylesheet" href="/css/table.css">
    <title>Laundry Register </title>
</head>

<body>
<div><a href="home.php"><img src="/image/back.png" class="btn_back" width="30px"></a>
    <form action="save_hotel_db.php" method="post">
        <div class="pinfo">Add Your Hotel Name</div>
        <div class="form-group">
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><img src="/image/3020274-200.png" width="30px"></span>
                    <input name="name_hotel" placeholder="Thames Valley" class="form-control" type="text" required
                        minlength="3">
                </div>
            </div>
        </div>
        <div class="pinfo">Type</div>
        <div class="form-group">
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                    <select class="form-control" id="type" name="type">
                        <option value="Villa">Villa</option>
                        <option value="Hotel">Hotel</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
    </script>
    <?php }else{ 
      echo "<script>";
      echo "window.location.href='index.php';";
      echo "</script>";
} ?>
</body>

</html>