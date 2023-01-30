<?php
	echo '
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

	//ไฟล์เชื่อมต่อฐานข้อมูล
	include('server.php') ;
	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	//check duplicat

$sql = "INSERT INTO `user2`(`id`, `fname`, `lname`, `username`, `password`) VALUES ('','$fname','$lname','$username','$password')";


if ($con ->query($sql) === TRUE) {
    echo '<script>
		setTimeout(function() {
		 swal({
			 title: "Success",
			 text: "Register Success",
			 type: "success"
		 }, function() {
			 window.location = "home.php"; //หน้าที่ต้องการให้กระโดดไป
		 });
	   }, 1000);
   </script>';
} else {
	echo '<script>
	setTimeout(function() {
	 swal({
		 title: "WebApp Error",
		 type: "error"
	 }, function() {
		 window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
	 });
   }, 1000);
</script>';
}

// Close the connection
$conn->close();

?>