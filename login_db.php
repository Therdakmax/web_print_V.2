<?php 
session_start();
if(isset($_POST['username'])){
	echo '
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
	//connection
	  include("server.php");
	//รับค่า user & password
	  $username = $_POST['username'];
	  $password = sha1($_POST['password']);
	//query 
	  $sql="SELECT * FROM user2 Where username='".$username."' and password='".$password."' ";

	  $result = mysqli_query($con,$sql);
	
	  if(mysqli_num_rows($result)==1){

		  $row = mysqli_fetch_array($result);

		 	$_SESSION["id"] = $row["username"];

			echo '<script>
			setTimeout(function() {
			 swal({
				 title: "Login Success",
				 text: "Login Success",
				 type: "success"
			 }, function() {
				 window.location = "home.php"; //หน้าที่ต้องการให้กระโดดไป
			 });
		   }, 1000);
	   </script>';

	  }else{
		echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Try Again !! ",  
						   text: "Try again",
						   type: "warning"
					   }, function() {
						window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
			   </script>';

	  }

}else{


 Header("Location: form.php"); //user & password incorrect back to login again

}
?>