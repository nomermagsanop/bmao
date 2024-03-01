<?php
session_start();

require 'database_connection.php';

$prog_name = strtoupper($_POST['inputProgramname']);
$prog_descrip = ($_POST['inputProgramdescrip']);
$status = strtoupper($_POST['inputProgramstatus']);
$prog_loc = strtoupper($_POST['inputProgramloc']);

$upload_url = $_FILES['inputupload']['name'];
$temp = explode(".", $_FILES["inputupload"]["name"]);
$newfilename = "";

if ($upload_url != "") {
    $newfilename = uniqid() . '.' . end($temp);
    $target = "img/programs/" . $newfilename;

    if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }
}

$sqlCheckExist = "SELECT * FROM programs WHERE prog_name = '$prog_name'";
$sqlCheckExistResult = mysqli_query($con, $sqlCheckExist);

if (mysqli_num_rows($sqlCheckExistResult) > 0) {
    $_SESSION['error'] = "Program already exists!";
} else {
    $insert_query = "INSERT INTO `programs` (`prog_name`,`prog_descrip`,`status`,`upload_url`,`prog_loc`) VALUES ('$prog_name','$prog_descrip','$status','$newfilename','$prog_loc')";

    if (mysqli_query($con, $insert_query)) {
        $_SESSION['success'] = "Program added successfully!";
        header('location: programs.php');
        exit; // Ensure to exit after a successful redirect
    } else {
        $_SESSION['error'] = $con->error;
        echo $con->error;
    }
}

mysqli_close($con);
header('location: programs.php'); // Redirect even if there's an error
exit; // Ensure to exit after redirect
?>
