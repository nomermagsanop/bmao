<?php
	session_start();
	require 'database_connection.php'; 
	
	$staff_id = strtoupper($_POST['staff_id']);
	$first_name = strtoupper($_POST['inputfName']);
	$middle_name = strtoupper($_POST['inputmName']);
	$last_name = strtoupper($_POST['inputlName']);
	$extension_name = strtoupper($_POST['inputeName']);
	$dob = strtoupper($_POST['inputdob']);
	$sex = strtoupper($_POST['inputsex']);
	$email = ($_POST['inputEmail']);
	$contact = strtoupper($_POST['inputContact']);
	$address = strtoupper($_POST['inputAddress']);
	$brgy = strtoupper($_POST['inputBrgy']);
	$role = strtoupper($_POST['inputRole']);
	$user = $_POST['inputUser'];
	$password = base64_encode(md5($_POST['inputCPassword']));
	
	$upload_url = $_FILES['inputupload']['name'];
	$temp = explode(".", $_FILES["inputupload"]["name"]);
	if ($upload_url != "") {
		$newfilename = rand(10000, 10000000) . '.' . end($temp);
		$target = "img/staffs/" . $newfilename;

		if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
			echo "Image uploaded successfully";
		} else {
			echo "Failed to upload image";
		}
	} else {
		$newfilename = "";
	}

	if ($upload_url == "") {
		if ($_SESSION["role"] == "ADMINISTRATOR" || $_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "BARANGAY STAFF") {
			if ($password == "") {
				$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',role='$role' WHERE staff_id=$staff_id";
			} else {
				$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',password='$password',role='$role' WHERE staff_id=$staff_id";
			}
		} else {
			$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',role='$role' WHERE staff_id=$staff_id";
		}
	} else {
		if ($_SESSION["role"] == "ADMINISTRATOR" || $_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "BARANGAY STAFF") {
			if ($password == "") {
				$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',role='$role',upload_url='$newfilename' WHERE staff_id=$staff_id";
			} else {
				$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',password='$password',role='$role',upload_url='$newfilename' WHERE staff_id=$staff_id";
			}
		} else {
			$update_query = "UPDATE staffs SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',address='$address',brgy='$brgy',role='$role',upload_url='$newfilename' WHERE staff_id=$staff_id";
		}
	}
           
	if (mysqli_query($con, $update_query)) {
		$_SESSION['success'] = "User updated successfully!";
		header('location: staffs.php');
	} else {
		echo $con->error;
	}
?>
