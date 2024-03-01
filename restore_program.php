<?php
require 'database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['program_id'])) {
    $program_id = $_POST['program_id'];

    // Update the delete_flag to 0 for the specified program_id
    $updateQuery = "UPDATE programs SET delete_flag = 0 WHERE program_id = $program_id";
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
