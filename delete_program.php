<?php
session_start();                
	require 'database_connection.php'; 
	
	$program_id = $_GET['program_id'];
	
    $sqlQuery = "UPDATE programs SET delete_flag = 1 WHERE program_id = '$program_id'";        
	if(mysqli_query($con, $sqlQuery)){
		$_SESSION['success']="Program marked for deletion successfully!";
		header('location: programs.php');
	}
	else { echo $con->error;}
?>
