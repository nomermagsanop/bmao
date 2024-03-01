<?php
// update_event.php

require 'database_connection.php';

$event_id = $_POST['event_id'];
$program_id = $_POST['program_id'];
$event_start_date = date("Y-m-d", strtotime($_POST['event_start_date']));
$event_start_time = date("Y-m-d H:i:s", strtotime($_POST['event_start_time']));
$event_end_date = date("Y-m-d", strtotime($_POST['event_end_date']));
$event_end_time = date("Y-m-d H:i:s", strtotime($_POST['event_end_time']));
$event_location = $_POST['event_location'];
$event_description = $_POST['event_description'];

// Use prepared statements to prevent SQL injection
$update_query = "UPDATE calendar_event_master SET program_id=?, event_start_date=?, event_start_time=?, event_end_date=?, event_end_time=?, event_location=?, event_description=? WHERE event_id=?";

$stmt = mysqli_prepare($con, $update_query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssssssss', $program_id, $event_start_date, $event_start_time, $event_end_date, $event_end_time, $event_location, $event_description, $event_id);

    if (mysqli_stmt_execute($stmt)) {
        $data = array(
            'status' => true,
            'msg' => 'Event updated successfully!'
        );
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, Event not updated. ' . mysqli_stmt_error($stmt)
        );
    }

    mysqli_stmt_close($stmt);
} else {
    $data = array(
        'status' => false,
        'msg' => 'Error preparing the update statement. ' . mysqli_error($con)
    );
}

mysqli_close($con);

echo json_encode($data);
?>
