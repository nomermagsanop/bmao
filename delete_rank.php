<?php
session_start();                
	require 'database_connection.php'; 
	
	$rank_id = $_GET['rank_id'];
	
	$sqlQuery = "DELETE FROM ranks WHERE rank_id='" .$rank_id. "'";  
           
	if(mysqli_query($con, $sqlQuery)){
		$_SESSION['success']="Rank deleted successfully!";
		header('location: ranks.php');
	}
	else { echo $con->error;}
?>
