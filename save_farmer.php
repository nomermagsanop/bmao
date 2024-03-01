<?php
session_start();
require 'database_connection.php';

$first_name = strtoupper($_POST['inputfName']);
$middle_name = strtoupper($_POST['inputmName']);
$last_name = strtoupper($_POST['inputlName']);
$extension_name = strtoupper($_POST['inputeName']);
$dob = strtoupper($_POST['inputdob']);
$sex = strtoupper($_POST['inputsex']);
$email = ($_POST['inputEmail']);
$contact = strtoupper($_POST['inputContact']);
$emergency_contact = strtoupper($_POST['inputEmergencyContact']);
$controlno = strtoupper($_POST['inputControlNo']);
$rnumber = strtoupper($_POST['inputRNumber']);
$address = strtoupper($_POST['inputAddress']);
$brgy = strtoupper($_POST['inputBrgy']);
$land_size = ($_POST['inputLandSize']);
$status = strtoupper($_POST['inputStatus']);
$upload_url = $_FILES['inputupload']['name'];
$temp = explode(".", $_FILES["inputupload"]["name"]);
if ($upload_url != "") {
    $newfilename = $controlno . '.' . end($temp);
} else {
    $newfilename = "";
}

$target = "img/farmers/" . $newfilename;

if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
    echo "Image uploaded successfully";
} else {
    echo "Failed to upload image";
}

$sqlCheckExist = "SELECT * FROM farmers WHERE contact = '$contact'";
$sqlCheckExist1 = "SELECT * FROM farmers WHERE controlno = '$controlno'";
$sqlCheckExist2 = "SELECT * FROM farmers WHERE rnumber = '$rnumber'";

// Execute SQL queries
$sqlCheckExistResult = mysqli_query($con, $sqlCheckExist);
$sqlCheckExistResult1 = mysqli_query($con, $sqlCheckExist1);
$sqlCheckExistResult2 = mysqli_query($con, $sqlCheckExist2);

// Check for errors in SQL queries
if (!$sqlCheckExistResult) {
    $_SESSION['error'] = "Error in SQL query: " . mysqli_error($con);
} elseif (mysqli_num_rows($sqlCheckExistResult) > 0) {
    $_SESSION['error'] = "Contact number already exists";
} elseif (!$sqlCheckExistResult1) {
    $_SESSION['error'] = "Error in SQL query: " . mysqli_error($con);
} elseif (mysqli_num_rows($sqlCheckExistResult1) > 0) {
    $_SESSION['error'] = "Control number already exists";
} elseif (!$sqlCheckExistResult2) {
    $_SESSION['error'] = "Error in SQL query: " . mysqli_error($con);
} elseif (mysqli_num_rows($sqlCheckExistResult2) > 0) {
    $_SESSION['error'] = "RSBSA number already exists";
} else {
    // The rest of your code for inserting the new record
    $insert_query = "INSERT INTO `farmers` (`first_name`,`middle_name`,`last_name`,`extension_name`,`dob`,`sex`,`email`,`contact`,`emergency_contact`,`controlno`,`rnumber`,`address`,`brgy`,`land_size`,`upload_url`,`status`) VALUES ('" . $first_name . "','" . $middle_name . "','" . $last_name . "','" . $extension_name . "','" . $dob . "','" . $sex . "','" . $email . "','" . $contact . "','" . $emergency_contact . "','" . $controlno . "','" . $rnumber . "','" . $address . "','" . $brgy . "','" . $land_size . "','" . $newfilename . "','" . $status . "')";

    if (mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Farmer added successfully!";
        header('location: farmers.php');
        exit(); // Add exit to stop further execution after redirection
    } else {
        $_SESSION['error'] = "Error in SQL query: " . mysqli_error($con);
    }
}

header('location: add_farmer.php');
exit(); // Add exit to stop further execution after redirection
?>
