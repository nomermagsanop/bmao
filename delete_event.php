<?php                
	require 'database_connection.php'; 
	
	$event_id = $_POST['event_id'];
	
	$insert_query = "DELETE FROM calendar_event_master WHERE event_id='" .$event_id. "'";  
           
	if(mysqli_query($con, $insert_query)){
		
		$data = array(
			'status' => true,
			'msg' => 'Event added successfully!'
		);
	}
	else{
		$data = array(
			'status' => false,
			'msg' => 'Sorry, Event not added.'				
		);
	}
echo json_encode($data);	
?>
