<?php
// update_statuses.php
require 'database_connection.php';

// Assuming you have a database connection established in your main file
include("your_database_connection_file.php");

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the 'ids' and 'status' parameters are set
    if (isset($_POST["ids"]) && isset($_POST["status"])) {
        // Get the values from the POST request
        $ids = $_POST["ids"];
        $status = $_POST["status"];

        // Sanitize input to prevent SQL injection (you may need to improve this depending on your needs)
        $ids = implode(",", array_map("intval", $ids));
        $status = mysqli_real_escape_string($con, $status);

        // Update the status in the database
        $updateQuery = "UPDATE farmers_records SET status = '$status' WHERE id IN ($ids)";
        $result = mysqli_query($con, $updateQuery);

        if ($result) {
            // If the update was successful, send a success response
            echo json_encode(["success" => true]);
        } else {
            // If there was an error with the update, send an error response
            echo json_encode(["success" => false, "error" => mysqli_error($con)]);
        }
    } else {
        // If 'ids' or 'status' parameters are not set, send an error response
        echo json_encode(["success" => false, "error" => "Missing parameters"]);
    }
} else {
    // If the request is not a POST request, send an error response
    echo json_encode(["success" => false, "error" => "Invalid request method"]);
}
?>
