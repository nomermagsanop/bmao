<?php
session_start();
require 'database_connection.php';

$farmer_id = strtoupper($_POST['farmer_id']);
$first_name = strtoupper($_POST['inputfName']);
$middle_name = strtoupper($_POST['inputmName']);
$last_name = strtoupper($_POST['inputlName']);
$extension_name = strtoupper($_POST['inputeName']);
$dob = strtoupper($_POST['inputdob']);
$sex = strtoupper($_POST['inputsex']);
$email = strtoupper($_POST['inputEmail']);
$contact = strtoupper($_POST['inputContact']);
$emergency_contact = strtoupper($_POST['inputEmergencyContact']);
$controlno = strtoupper($_POST['inputControlNo']);
$rnumber = strtoupper($_POST['inputRNumber']);
$address = strtoupper($_POST['inputAddress']);
$brgy = strtoupper($_POST['inputBrgy']);
$land_size = strtoupper($_POST['inputLandSize']);
$status = strtoupper($_POST['inputStatus']);

$temp = explode(".", $_FILES["inputupload"]["name"]);
$newfilename = $controlno . '.' . end($temp);

$upload_url = $_FILES['inputupload']['name'];
$target = "img/farmers/".$newfilename;

if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
    echo "Image uploaded successfully";
} else {
    echo "Failed to upload image";
}

$sqlCheckExist = "SELECT * FROM farmers WHERE contact = '$contact'";
$sqlCheckExist1 = "SELECT * FROM farmers WHERE controlno = '$controlno'";
$sqlCheckExist2 = "SELECT * FROM farmers WHERE rnumber = '$rnumber'";

$sqlCheckExistResult = mysqli_query($con, $sqlCheckExist);
$sqlCheckExistResult1 = mysqli_query($con, $sqlCheckExist1);
$sqlCheckExistResult2 = mysqli_query($con, $sqlCheckExist2);

if(mysqli_num_rows($sqlCheckExistResult) > 0){ ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Contact number already exists'
    });
    </script>
<?php }
else if(mysqli_num_rows($sqlCheckExistResult1) > 0){?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Control number already exists'
    });
    </script>
<?php }
else if(mysqli_num_rows($sqlCheckExistResult2) > 0){?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'RSBSA number already exists'
    });
    </script>
<?php }

if ($upload_url == "") {
    $update_query = "UPDATE farmers SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',emergency_contact='$emergency_contact',controlno='$controlno',rnumber='$rnumber',address='$address',brgy='$brgy',land_size='$land_size',status='$status' WHERE farmer_id=$farmer_id";
} else {
    $update_query = "UPDATE farmers SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',extension_name='$extension_name',dob='$dob',sex='$sex',email='$email',contact='$contact',emergency_contact='$emergency_contact',controlno='$controlno',rnumber='$rnumber',address='$address',brgy='$brgy',land_size='$land_size',upload_url='$newfilename',status='$status' WHERE farmer_id=$farmer_id";
}

if(mysqli_query($con, $update_query)){
    // Get the staff_id from the session (replace 'your_session_key' with the actual session key)
    
    $farmer_id = $_POST['farmer_id'];
    $staff_id = $_SESSION['staff_id'];

    // Insert log entry
   $log_insert_query = "INSERT INTO logs (staff_id, farmer_id, contact, emergency_contact, created_at) VALUES ('$staff_id', '$farmer_id', '$contact', '$emergency_contact', NOW())";

    
    if(mysqli_query($con, $log_insert_query)){
        $_SESSION['success']="Farmer updated successfully!";
        header('location: farmers.php');
    } else {
        echo "Error inserting log entry: " . $con->error;
    }
} else {
    echo "Error updating farmer: " . $con->error;
}
?>
