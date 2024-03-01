<?php                
	session_start();
	require 'database_connection.php'; 
	
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
	if($upload_url != ""){
		$newfilename = rand(10000,10000000) . '.' . end($temp);
	}else{$newfilename = "";}
	
	$target = "img/staffs/".$newfilename;

	if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
  		echo "Image uploaded successfully";
  	}else{
  		echo "Failed to upload image";
  	}
	
	
	$insert_query = "insert into `staffs` (`username`,`password`,`first_name`,`middle_name`,`last_name`,`extension_name`,`dob`,`sex`,`email`,`contact`,`address`,`brgy`,`role`,`upload_url`) values ('".$user."','".$password."','".$first_name."','".$middle_name."','".$last_name."','".$extension_name."','".$dob."','".$sex."','".$email."','".$contact."','".$address."','".$brgy."','".$role."','".$newfilename."')";  
           
	if(mysqli_query($con, $insert_query)){
		$_SESSION['success']="User added successfully!";
		header('location: staffs.php');
	}
	else { echo $con->error;}
	
?>
