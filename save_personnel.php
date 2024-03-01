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
$address = strtoupper($_POST['inputAddress']);
$brgy = strtoupper($_POST['inputBrgy']);
$mun = strtoupper($_POST['inputMun']);  // Fix: Change 'mun' to 'inputMun'
$rank_id = strtoupper($_POST['inputRank_id']);  // Assuming this is the correct name attribute

$upload_url = $_FILES['inputupload']['name'];
$temp = explode(".", $_FILES["inputupload"]["name"]);
if ($upload_url != "") {
    $newfilename = rand(10000, 10000000) . '.' . end($temp);
} else {
    $newfilename = "";
}

$target = "img/personnel/" . $newfilename;

if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
    echo "Image uploaded successfully";
} else {
    echo "Failed to upload image";
}

$insert_query = "INSERT INTO `personnel` (`first_name`,`middle_name`,`last_name`,`extension_name`,`dob`,`sex`,`email`,`contact`,`address`,`brgy`,`mun`,`rank_id`,`upload_url`) VALUES ('" . $first_name . "','" . $middle_name . "','" . $last_name . "','" . $extension_name . "','" . $dob . "','" . $sex . "','" . $email . "','" . $contact . "','" . $address . "','" . $brgy . "','" . $mun . "','" . $rank_id . "','" . $newfilename . "')";

if (mysqli_query($con, $insert_query)) {
    $_SESSION['success'] = "Personnel added successfully!";
    header('location: personnels.php');
} else {
    echo $con->error;
}
?>
