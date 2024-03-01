<?php
session_start();
require 'database_connection.php';

// Retrieve POST data and sanitize inputs
$program_id = mysqli_real_escape_string($con, $_POST['program_id']);
$event_start_date = mysqli_real_escape_string($con, $_POST['event_start_date']);
$event_start_time = mysqli_real_escape_string($con, $_POST['event_start_time']);
$event_end_date = mysqli_real_escape_string($con, $_POST['event_end_date']);
$event_end_time = mysqli_real_escape_string($con, $_POST['event_end_time']);
$event_location = serialize($_POST['event_location']);
$event_description = mysqli_real_escape_string($con, $_POST['event_description']);

$status = 'PENDING';

// Check if an event with the same program_id and event_location exists
$check_query = "SELECT COUNT(*) as count FROM `calendar_event_master` 
                WHERE `program_id` = '$program_id' 
                AND `event_location` = '$event_location'";

$check_result = mysqli_query($con, $check_query);

if ($check_result === false) {
    $data = array(
        'status' => 'error',
        'msg' => 'Database error while checking for existing events.'
    );
    echo json_encode($data);
    exit;
}

$check_data = mysqli_fetch_assoc($check_result);

if ($check_data['count'] == 0) {
    // No existing event, proceed with the insert
    $insert_query = "INSERT INTO `calendar_event_master` 
                     (`event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`, 
                      `event_location`, `event_description`, `program_id`, `status`) 
                     VALUES ('$event_start_date', '$event_start_time', '$event_end_date', '$event_end_time',
                             '$event_location', '$event_description', '$program_id', '$status')";

    if (mysqli_query($con, $insert_query)) {
        $data = array(
            'status' => 'success',
            'msg' => 'Event added successfully!'
        );
    } else {
        $data = array(
            'status' => 'error',
            'msg' => 'Sorry, Event not added.'
        );
    }
} else {
    // Existing event with the same program_id and event_location, provide a message
    $data = array(
        'status' => 'error',
        'msg' => 'Duplicate event. Event not added.'
    );
}

echo json_encode($data);
?>
