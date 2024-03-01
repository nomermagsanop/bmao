<?php         

	session_start();           
	require 'database_connection.php'; 
	
	$personnel_id = $_GET['personnel_id'];
	
	$sqlQuery = "DELETE FROM personnel WHERE personnel_id='" .$personnel_id. "'";  
           
	if(mysqli_query($con, $sqlQuery)){
		$_SESSION['success']="Personnel deleted successfully!";
		header('location: personnels.php');
	}
	else { echo $con->error;}
?>
