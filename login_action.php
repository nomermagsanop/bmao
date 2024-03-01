<?php
	session_start();
	require 'database_connection.php';

	$user = $_POST['inputUser'];
	$password = base64_encode(md5($_POST['inputPassword']));

	$sqlQueryStaff = "SELECT * FROM staffs WHERE username=? AND password=?";
	
	$stmt = mysqli_prepare($con, $sqlQueryStaff);
	mysqli_stmt_bind_param($stmt, "ss", $user, $password);
	mysqli_stmt_execute($stmt);
	$resultstaff = mysqli_stmt_get_result($stmt);

	if ($resultstaff) {
		$row = mysqli_fetch_assoc($resultstaff);
		if ($row && mysqli_num_rows($resultstaff) > 0) {
			$_SESSION["loggedIn"] = "Logged";
			$_SESSION["staff_id"] = $row['staff_id'];
			$_SESSION["first_name"] = $row['first_name'];
			$_SESSION["last_name"] = $row['last_name'];
			$_SESSION["role"] = $row['role'];
			
			if ($row['role'] == "BARANGAY STAFF") {
				$_SESSION["brgy"] = $row['brgy'];
			}
			
			$_SESSION["upload_url"] = $row['upload_url'];
			header("Location: dashboard.php");
		} else {
			header("Location: login.php?failed=1");
		}
	} else {
		echo $con->error;
	}

	mysqli_stmt_close($stmt);
	mysqli_close($con);
?>
