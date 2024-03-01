<?php
session_start();                
require 'database_connection.php'; 

$farmer_id = $_GET['farmer_id'];

// Instead of deleting, update the delete_flag to 1
$sqlQuery = "UPDATE farmers SET delete_flag = 1 WHERE farmer_id = '$farmer_id'";  

if(mysqli_query($con, $sqlQuery)){
    $_SESSION['success'] = "Farmer marked for deletion successfully!";
    header('location: farmers.php');
} else {
    echo $con->error;
}
?>
