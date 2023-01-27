<!DOCTYPE html>
<html>
<head>
<title>LAUNDRY HOUSE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/print.css">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('/w3images/forestbridge.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge w3-animate-fading">
    <img src="/image/logo.jpg" width="150px">
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-zoom text_black">THE LAUNDRY HOUSE LOGIN</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <br><br><br>
<form action="login_db.php" method="post">
    <div class="box text_black w3-center w3-animate-zoom">
        <br>
    <h3 class="text-black">&nbsp; Username</h3>
    <input type="text" class="w3-animate-input" name="username">
    <h3 class="text-black">&nbsp; Password</h3>
    <input type="password" style="margin-right: -10mm;"  class="w3-animate-input" name="password" id="myInput">
    <a href="#" onclick="myFunction()"><img src="/image/eye.png" width="30px"></a><br>
<br>
    <button type="submit" class="w3-button buttom w3-animate-bottom">LOGIN</button>
 
    </div>
    
  </div>
</div>
 </form>
</body>
</html>
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    