<?php 
session_start();
        if(isset($_POST['username']) && isset($_POST['password'])){
				//connection
                  include("server.php");
				//รับค่า user & password
                  $username = $_POST['username'];
                  $password = sha1($_POST['password']);
				//query 
                  $sql="SELECT * FROM User2 Where username='".$username."' and aassword='".$password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["id"] = $row["id"];
                      echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Success",
						   text: "Login Success",
						   type: "Success"
					   }, function() {
						   window.location = "home.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
				 </script>';
                      
                      Header("Location: home.php");


                  }else{
                    echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Check Your Usernama Or Password !! ",  
						   text: "Try again",
						   type: "warning"
					   }, function() {
						window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
			   </script>';

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>