
<?php session_start(); 
if ($_SESSION['id'] != "") { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Laundry Register </title>
  </head>
  <body>
  <a href="home.php"><img src="/image/back.png" class="btn_back" width="30px"></a>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8"> <br> 
          <h4>Add Users</h4>
          <form action="save_register_db.php" method="post">
            <div class="mb-2">
                <div class="col-sm-9">
                <input type="text" name="fname" class="form-control" required minlength="3" placeholder="First Name">
              </div>
              </div>
              <div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="lname" class="form-control" required minlength="3" placeholder="Last Name">
                </div>
                </div>
                <div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" required minlength="3" placeholder="Username">
                </div>
                </div>
                <div class="mb-3">
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" required minlength="3" placeholder="Password">
                </div>
                </div>
                <div class="d-grid gap-2 col-sm-9 mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        </script>
        <?php }else{ 
      echo "<script>";
      echo "window.location.href='index.php';";
      echo "</script>";
} ?>
      </body>
    </html>  