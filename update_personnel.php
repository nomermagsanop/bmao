

<?php
require 'database_connection.php';
session_start();

$personnel_id = $_POST['personnel_id'];
$first_name = strtoupper($_POST['inputfName']);
$middle_name = strtoupper($_POST['inputmName']);
$last_name = strtoupper($_POST['inputlName']);
$extension_name = strtoupper($_POST['inputeName']);
$dob = strtoupper($_POST['inputdob']);
$sex = strtoupper($_POST['inputsex']);
$email = $_POST['inputEmail'];
$contact = strtoupper($_POST['inputContact']);
$address = strtoupper($_POST['inputAddress']);
$brgy = strtoupper($_POST['inputBrgy']);
$mun = strtoupper($_POST['inputMun']);
$rank_id = strtoupper($_POST['inputRank_id']);

$temp = explode(".", $_FILES["inputupload"]["name"]);
$newfilename = end($temp);

$target = "img/personnel/" . $newfilename;

if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
    echo "Image uploaded successfully";
} else {
    echo "Failed to upload image";
}

// Build the update query based on conditions
if ($newfilename == "") {
    $update_query = "UPDATE personnel SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',
    dob='$dob',sex='$sex', email='$email',contact='$contact',address='$address',brgy='$brgy',mun='$mun',rank_id='$rank_id' WHERE personnel_id=$personnel_id";
} else {
    $update_query = "UPDATE personnel SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',
    dob='$dob',sex='$sex', email='$email',contact='$contact',address='$address',brgy='$brgy',mun='$mun',rank_id='$rank_id', upload_url='$newfilename'  WHERE personnel_id=$personnel_id";
}

if (mysqli_query($con, $update_query)) {
    $_SESSION['success'] = "Personnel updated successfully!";
    header('location: personnels.php');
} else {
    echo $con->error;
}
?>
