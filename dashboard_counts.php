<?php
	require 'database_connection.php'; 

// Count active farmers
$role = $_SESSION['role'] ?? '';

if ($role == "OFFICE STAFF" || $role == "ADMINISTRATOR") {
    $sqlQueryActive = "SELECT COUNT(farmer_id) AS activecount FROM farmers WHERE status='Active' AND delete_flag=0";
} elseif ($role == "BARANGAY STAFF") {
    // Assuming you have a session variable for the barangay value of the BARANGAY STAFF
    $userBrgy = $_SESSION['brgy'] ?? '';
    $sqlQueryActive = "SELECT COUNT(farmer_id) AS activecount FROM farmers WHERE status='Active' AND brgy='$userBrgy' AND delete_flag=0";
} else {
    // Provide a default query or handle the case appropriately
    $sqlQueryActive = "SELECT COUNT(farmer_id) AS activecount FROM farmers WHERE status='Active' AND delete_flag=0";
}

if ($resultactive = mysqli_query($con, $sqlQueryActive)) {
    $active_count = mysqli_fetch_assoc($resultactive);
    
} else {
    echo $con->error;
}


	// Define the current date
	$currentDate = date('Y-m-d');

	// Count upcoming events
	$sqlQueryEvent = "SELECT COUNT(event_id) as eventcount FROM calendar_event_master WHERE status = 'PENDING' AND event_start_date >= '$currentDate'";
	if ($resultevent = mysqli_query($con, $sqlQueryEvent)) {
		$event_count = mysqli_fetch_assoc($resultevent);
	} else {
		echo $con->error;
	}

	// Count staff
	$sqlQueryStaff = "SELECT Count(staff_id) as staffcount FROM staffs";
	if ($resultstaff = mysqli_query($con, $sqlQueryStaff)) {
		$staff_count = mysqli_fetch_assoc($resultstaff);
	} else {
		echo $con->error;
	}

	
$role = $_SESSION['role'] ?? '';

if ($role == "OFFICE STAFF" || $role == "ADMINISTRATOR") {
    $sqlQueryInactive = "SELECT COUNT(farmer_id) AS inactivecount FROM farmers WHERE status='INACTIVE' AND delete_flag = 0";
} elseif ($role == "BARANGAY STAFF") {
    // Assuming you have a session variable for the barangay value of the BARANGAY STAFF
    $userBrgy = $_SESSION['brgy'] ?? '';
    $sqlQueryInactive = "SELECT COUNT(farmer_id) AS inactivecount FROM farmers WHERE status='INACTIVE' AND brgy='$userBrgy' AND delete_flag = 0";
} else {
    // Provide a default query or handle the case appropriately
    $sqlQueryInactive = "SELECT COUNT(farmer_id) AS inactivecount FROM farmers WHERE status='INACTIVE' AND delete_flag = 0";
}

if ($resultinactive = mysqli_query($con, $sqlQueryInactive)) {
    $inactive_count = mysqli_fetch_assoc($resultinactive);
} else {
    echo $con->error;
}
?>
