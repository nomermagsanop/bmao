


<?php
require 'database_connection.php';
session_start();

$program_id = $_POST['program_id']; // Assuming you have the program_id in your form

$prog_name = ($_POST['inputProgramname']);
$prog_descrip = $_POST['inputProgramdescrip']; // Removed unnecessary parentheses
$status = ($_POST['inputProgramstatus']);
$prog_loc = ($_POST['inputProgramloc']);

$temp = explode(".", $_FILES["inputupload"]["name"]);
$newfilename = end($temp);

$target = "img/programs/" . $newfilename;

if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
    echo "Image uploaded successfully";
} else {
    echo "Failed to upload image";
}

// Build the update query based on conditions

if ($newfilename == "") {
    $update_query = "UPDATE programs SET prog_name='$prog_name', prog_descrip='$prog_descrip', status='$status', prog_loc='$prog_loc' WHERE program_id=$program_id";
} else {
    $update_query = "UPDATE programs SET prog_name='$prog_name', prog_descrip='$prog_descrip', status='$status', prog_loc='$prog_loc', upload_url='$newfilename' WHERE program_id=$program_id";
}

if (mysqli_query($con, $update_query)) {
    $_SESSION['success'] = "Program updated successfully!";
    header('location: programs.php');
} else {
    echo $con->error;
}
?>
