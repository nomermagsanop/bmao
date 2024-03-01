<?php         

	session_start();           
	require 'database_connection.php'; 
	
	$staff_id = $_GET['staff_id'];
	
	$sqlQuery = "DELETE FROM staffs WHERE staff_id='" .$staff_id. "'";  
           
	if(mysqli_query($con, $sqlQuery)){
		$_SESSION['success']="User deleted successfully!";
		header('location: staffs.php');
	}
	else { echo $con->error;}
?>
