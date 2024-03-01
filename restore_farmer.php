<?php
require 'database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['farmer_id'])) {
    $farmer_id = $_POST['farmer_id'];

    // Update the delete_flag to 0 for the specified farmer_id
    $updateQuery = "UPDATE farmers SET delete_flag = 0 WHERE farmer_id = $farmer_id";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        // Return a success response
        echo json_encode(['success' => true]);
    } else {
        // Return an error response
        echo json_encode(['success' => false, 'message' => 'Failed to update delete_flag']);
    }
} else {
    // Return an error response if the request is not valid
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

// Close the database connection
mysqli_close($con);
?>
