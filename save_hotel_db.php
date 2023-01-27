<?php

//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['name_hotel']) && isset($_POST['type'])) {
	// sweet alert 
	echo '
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

	//ไฟล์เชื่อมต่อฐานข้อมูล
	require_once 'server.php';
	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$name_hotel = $_POST['name_hotel'];
	$type = $_POST['type'];
	//check duplicat
	$stmt = $conn->prepare("SELECT id FROM hotel WHERE name_hotel = :name_hotel");
	//$stmt->bindParam(':username', $username , PDO::PARAM_STR);
	$stmt->execute(array(':name_hotel' => $name_hotel));
	//ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
	if ($stmt->rowCount() > 0) {
		echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Repeat Hotel !! ",  
						   text: "Try again",
						   type: "warning"
					   }, function() {
						window.location = "addhotel.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
			   </script>';
	} else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
		//sql insert
		$stmt = $conn->prepare("INSERT INTO `hotel`( `name_hotel`, `type`) VALUES ('$name_hotel','$type')");
		$stmt->bindParam(':name_hotel', $name_hotel, PDO::PARAM_STR);
		$stmt->bindParam(':type', $type, PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			echo '<script>
					  setTimeout(function() {
					   swal({
						   title: "Success",
						   text: "กรุณารอระบบ Login ใน Workshop ต่อไป",
						   type: "success"
					   }, function() {
						   window.location = "addhotel.php"; //หน้าที่ต้องการให้กระโดดไป
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
						   window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
					   });
					 }, 1000);
				 </script>';
		}
		$conn = null; //close connect db
	} //else chk dup
} //isset 
?> 