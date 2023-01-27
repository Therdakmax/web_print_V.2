<?php
//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['password'])) {
	// sweet alert 
	echo '
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

	//ไฟล์เชื่อมต่อฐานข้อมูล
	require_once 'server.php';
	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	//check duplicat
	$stmt = $conn->prepare("SELECT id FROM user2 WHERE username = :username");
	$stmt->bindParam(':username', $username , PDO::PARAM_STR);
	$stmt->execute(array(':username' => $username));
	//ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
	if ($stmt->rowCount() > 0) {
		echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Repeat User !! ",  
						   text: "Try again",
						   type: "warning"
					   }, function() {
						window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
			   </script>';
	} else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
		//sql insert
		$stmt = $conn->prepare("INSERT INTO `user2`(`id`, `fname`, `lname`, `username`, `password`) VALUES ('','$fname','$lname','$username','$password')");
		$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
		$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Success",
						   text: "Register Success",
						   type: "success"
					   }, function() {
						   window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
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
						   window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
				 </script>';
		}
		$con = null; //close connect db
	} //else chk dup
} //isset 
?>