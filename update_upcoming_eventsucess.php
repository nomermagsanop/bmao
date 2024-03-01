<?php
// update_upcoming_eventsuccess.php

require 'database_connection.php';

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Update the status to "accomplished"
    $update_query = "UPDATE calendar_event_master SET status = 'ACCOMPLISHED' WHERE event_id = $event_id";

    if (mysqli_query($con, $update_query)) {
        // Redirect back to the previous page or wherever you want
        header("Location: upcoming_events.php");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
} else {
    echo "Event ID not provided.";
}
?>
