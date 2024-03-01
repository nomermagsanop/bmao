<?php                
	require 'database_connection.php'; 
	
	$rank_name = strtoupper($_POST['inputRankname']);
	$rank_description = ($_POST['inputRankdescription']);
	
	
	
	
	$insert_query = "insert into `ranks` (`rank_name`,`rank_description`) values ('".$rank_name."','".$rank_description."')";  
           
	if(mysqli_query($con, $insert_query)){
	$_SESSION['success']="Rank added successfully!";
		header('location: ranks.php');
	}
	else { echo $con->error;}
	
?>
