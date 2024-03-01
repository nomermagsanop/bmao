<?php
$title = "Botolan Municipal Agriculture Office - Add New Farmer";
include "include/header.php";
require 'database_connection.php';

function canEditField($role, $field) {
    if ($role == 'ADMINISTRATOR' || $role == 'OFFICE STAFF') {
        return true; // Allow all fields for administrators and office staff
    } elseif ($role == 'BARANGAY STAFF' && ($field == 'contact' || $field == 'emergency_contact')) {
        return true; // Allow only Contact number and Emergency number for barangay staff
    }
    return false; // Default: disallow editing
}

$farmer_id = isset($_GET['farmer_id']) ? $_GET['farmer_id'] :'';

$first_name = "";
$middle_name = "";
$last_name = "";
$extension_name = "";
$dob = "";
$sex = "";
$email = "";
$rnumber = "";
$controlno = "";
$contact = "";
$emergency_contact = "";
$address = "";
$brgy = "";
$land_size = "";
$image = "";
$status = "";
$created_at = "";



if($farmer_id != ""){

$display_farmers = "SELECT * FROM farmers WHERE farmer_id = $farmer_id";
$sqlQuery = mysqli_query($con, $display_farmers) or die( mysqli_error($con));

while($row = mysqli_fetch_array($sqlQuery)){
$farmer_id = $row['farmer_id'];
$first_name = $row['first_name'];
$middle_name = $row['middle_name'];
$last_name = $row['last_name'];
$extension_name = $row['extension_name'];
$dob = $row['dob'];
$sex = $row['sex'];
$email = $row['email'];
$rnumber = $row['rnumber'];
$controlno = $row['controlno'];
$contact = $row['contact'];
$emergency_contact = $row['emergency_contact'];
$address = $row['address'];

if (isset($_SESSION['brgy'])) {
$brgy = $_SESSION['brgy'];
} else {
$brgy = $row['brgy'];
}


$land_size = $row['land_size'];
$status = $row['status'];


$image = $row['upload_url'];
}
}
?>

<?php         
// session_start();       
require 'database_connection.php'; 	
if (isset($_POST['submit'])) {
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
if($upload_url != ""){
$newfilename = $controlno . '.' . end($temp);
}else{$newfilename = "";}

$target = "img/farmers/".$newfilename;
if (move_uploaded_file($_FILES['inputupload']['tmp_name'], $target)) {
echo "Image uploaded successfully";
}else{
echo "Failed to upload image";
}

$sqlCheckExist = "SELECT * FROM farmers
	WHERE contact = '$contact'";
$sqlCheckExist1 = "SELECT * FROM farmers
	WHERE  controlno = '$controlno'";
$sqlCheckExist2 = "SELECT * FROM farmers
	WHERE  rnumber = '$rnumber'";
$sqlCheckExistResult = mysqli_query($con, $sqlCheckExist);
$sqlCheckExistResult1 = mysqli_query($con, $sqlCheckExist1);
$sqlCheckExistResult2 = mysqli_query($con, $sqlCheckExist2);
if(mysqli_num_rows($sqlCheckExistResult) > 0){ ?>
<script>
Swal.fire({
icon: 'error',
title: 'Error!',
text: 'Contact number already exist'
});
</script>
<?php }
else if(mysqli_num_rows($sqlCheckExistResult1) > 0){?>
<script>
Swal.fire({
icon: 'error',
title: 'Error!',
text: 'Control number already exist'
});
</script>
<?php }
else if(mysqli_num_rows($sqlCheckExistResult2) > 0){?>
<script>
Swal.fire({
icon: 'error',
title: 'Error!',
text: 'RSBSA number already exist'
});
</script>
<?php }


else{
$insert_query = "insert into `farmers` (`first_name`,`middle_name`,`last_name`,`extension_name`,`dob`,`sex`,`email`,`contact`,`emergency_contact`,`controlno`,`rnumber`,`address`,`brgy`,`land_size`,`upload_url`,`status`,`created_at`) values ('".$first_name."','".$middle_name."','".$last_name."','".$extension_name."','".$dob."','".$sex."','".$email."','".$contact."','".$emergency_contact."','".$controlno."','".$rnumber."','".$address."','".$brgy."','".$land_size."','".$newfilename."','".$status."',
    NOW())";

if(mysqli_query($con, $insert_query)){ 
$_SESSION['success']="Farmer added successfully!";
header('location: farmers.php');
}
else { echo $con->error;}
}

}



?>


<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<?php include "include/sidebar.php"; ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
	
<!-- Navbar -->
<?php include "include/navbar.php"; ?>
<!-- End of Navbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<?php if($farmer_id != "") { ?>
    <h1 class="h3 mb-0 text-gray-800">Edit Farmer</h1>
	<?php } else { ?>
    <h1 class="h3 mb-0 text-gray-800">Add New Farmer</h1>
	<?php } ?>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Farmer's Informations:</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
				<?php if(isset($_GET['farmer_id'])) {?>
					<form id="farmers_form" class="needs-validation" novalidate="" action="update_farmer.php" method="POST" enctype="multipart/form-data">
				<?php } else {?>
					<form id="farmers_form" class="needs-validation" novalidate="" action="add_farmer.php" method="POST" enctype="multipart/form-data">
				<?php }?>
					<div class="row">
						<div class="row col-md-10 col-sm-12">

							<div class="form-group col-md-4 col-sm-12">
								<label for="inputfName">First Name</label>
								<input type="hidden" class="form-control" id="farmer_id" name="farmer_id"  value="<?php echo isset($_GET['farmer_id']) ? $_GET['farmer_id'] :'';?>">
								<input type="text" class="form-control text-uppercase" id="inputfName" name="inputfName" placeholder="First Name" value="<?php echo $first_name; ?>" <?php echo canEditField($_SESSION['role'], 'first_name') ? '' : 'readonly'; ?> required>
								<div class="invalid-feedback">Please Fill up the First Name.</div>
							</div>

							<div class="form-group col-md-3 col-sm-12">
								<label for="inputmName">Middle Name</label>
								<input type="text" class="form-control text-uppercase" id="inputmName" name="inputmName" placeholder="Middle Name" value="<?php echo $middle_name; ?>"<?php echo canEditField($_SESSION['role'], 'middle_name') ? '' : 'readonly'; ?>>
								<div class="invalid-feedback">Please Fill up the Middle Name.</div>
							</div>

							<div class="form-group col-md-4 col-sm-12">
								<label for="inputlName">Last Name</label>
								<input type="text" class="form-control text-uppercase" id="inputlName" name="inputlName" placeholder="Last Name" value="<?php echo $last_name; ?>"<?php echo canEditField($_SESSION['role'], 'last_name') ? '' : 'readonly'; ?> required>
								<div class="invalid-feedback">Please Fill up the Last Name.</div>
							</div>

							<div class="form-group col-md-1 col-sm-12">
							    <label for="inputeName">Extension</label>
							    <select class="form-control text-uppercase" id="inputeName" name="inputeName" <?php echo canEditField($_SESSION['role'], 'extension_name') ? '' : 'disabled'; ?>>
							        <option value=""></option>
							        <option value="jr" <?php echo ($extension_name == 'JR') ? 'selected="selected"' : ''; ?> >JR</option>
							        <option value="i" <?php echo ($extension_name == 'I') ? 'selected="selected"' : ''; ?> >I</option>
							        <option value="ii" <?php echo ($extension_name == 'II') ? 'selected="selected"' : ''; ?> >II</option>
							        <option value="iii" <?php echo ($extension_name == 'III') ? 'selected="selected"' : ''; ?> >III</option>
							        <option value="iv" <?php echo ($extension_name == 'IV') ? 'selected="selected"' : ''; ?> >IV</option>
							        <option value="v" <?php echo ($extension_name == 'V') ? 'selected="selected"' : ''; ?> >V</option>
							       
							    </select>
							</div>
							<div class="form-group col-md-6">
								<label for="inputdob">Date of Birth</label>
								<input type="date" class="form-control text-uppercase" id="inputdob" name="inputdob" placeholder="Date of Birth" value="<?php echo $dob; ?>" <?php echo canEditField($_SESSION['role'], 'dob') ? '' : 'readonly'; ?> required>
								<div class="invalid-feedback">Please Fill up the Date of Birth.</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputsex">Sex</label>
								<select class="form-control text-uppercase" id="inputsex" name="inputsex" <?php echo canEditField($_SESSION['role'], 'sex') ? '' : 'disabled'; ?> required>
								    <option value="">Choose options</option>
								    <option value="MALE"<?=$sex == 'MALE' ? ' selected="selected"' : '';?>>MALE</option>
								    <option value="FEMALE"<?=$sex == 'FEMALE' ? ' selected="selected"' : '';?>>FEMALE</option>
								</select>

								<div class="invalid-feedback">Please Choose the Sex.</div>
							</div>
							<div class="form-group col-md-4 col-sm-12">
								<label for="inputEmail">Email</label>
								<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo $email; ?>"<?php echo canEditField($_SESSION['role'], 'email') ? '' : 'readonly'; ?> required>

								<div class="invalid-feedback">Please Fill up the Email Address.</div>
							</div>
							<div class="form-group col-md-4 col-sm-12">
								<label for="inputContact">Contact Number</label>
								<div class="input-group">
									<input type="text" class="form-control text-uppercase" id="inputContact" name="inputContact" placeholder="09XX XXX XXXX" value="<?php echo $contact; ?>" <?php echo canEditField($_SESSION['role'], 'contact') ? '' : 'readonly';?> required pattern="[0-9]{11}" maxlength="11">

									<div class="invalid-feedback">Please Fill up the Contact Number.</div>
								</div>
							</div>
							<div class="form-group col-md-4 col-sm-12">
								<label for="inputEmergencyContact">Emergency Contact Number</label>
								<div class="input-group">
									<input type="tel" class="form-control text-uppercase" id="inputEmergencyContact" name="inputEmergencyContact" placeholder="09XX XXX XXXX" value="<?php echo $emergency_contact; ?>" <?php echo canEditField($_SESSION['role'], 'emergency_contact') ? '' : 'readonly'; ?> required maxlength="11" pattern="[0-9]{11}">


									<div class="invalid-feedback">Please Fill up the Emergency Contact Number.</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputControlNo">Control Number</label>
								<input type="number" class="form-control text-uppercase" id="inputControlNo" name="inputControlNo" placeholder="Control Number" value="<?php echo $controlno; ?>" <?php echo canEditField($_SESSION['role'], 'controlno') ? '' : 'readonly'; ?> required>

								<div class="invalid-feedback">Please Fill up the Control Number.</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputRNumber">RSBSA Number</label>
								<input type="number" class="form-control text-uppercase" id="inputRNumber" name="inputRNumber" placeholder="RSBSA Number" value="<?php echo $rnumber; ?>" <?php echo canEditField($_SESSION['role'], 'rnumber') ? '' : 'readonly'; ?> required>

								<div class="invalid-feedback">Please Fill up the RSBSA Number.</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputAddress">Street</label>
								<input type="text" class="form-control text-uppercase" id="inputAddress" name="inputAddress" placeholder="1234 Main St" value="<?php echo $address; ?>" <?php echo canEditField($_SESSION['role'], 'address') ? '' : 'readonly'; ?> required>

								<div class="invalid-feedback">Please Fill up the Address.</div>
							</div>
							<?php if (!isset($_SESSION['brgy'])) { ?>						
							<div class="form-group col-md-6 col-sm-12">
								<label for="inputBrgy">Barangay</label>
								<select class="form-control text-uppercase" id="inputBrgy" name="inputBrgy" required>
									<option value="" selected disabled>Choose options</option>
									<option value="Bancal"<?=$brgy == 'BANCAL' ? ' selected="selected"' : '';?>>Bancal</option>
									<option value="Bangan"<?=$brgy == 'BANGAN' ? ' selected="selected"' : '';?>>Bangan</option>
									<option value="Batonlapoc"<?=$brgy == 'BATONLAPOC' ? ' selected="selected"' : '';?>>Batonlapoc</option>
									<option value="Belbel"<?=$brgy == 'BELBEL' ? ' selected="selected"' : '';?>>Belbel</option>
									<option value="Beneg"<?=$brgy == 'BENEG' ? ' selected="selected"' : '';?>>Beneg</option>
									<option value="Binuclutan"<?=$brgy == 'BINUCLUTAN' ? ' selected="selected"' : '';?>>Binuclutan</option>
									<option value="Burgos"<?=$brgy == 'BURGOS' ? ' selected="selected"' : '';?>>Burgos</option>
									<option value="Cabatuan"<?=$brgy == 'CABATUAN' ? ' selected="selected"' : '';?>>Cabatuan</option>
									<option value="Capayawan"<?=$brgy == 'CAPAYAWAN' ? ' selected="selected"' : '';?>>Capayawan</option>
									<option value="Carael"<?=$brgy == 'CARAEL' ? ' selected="selected"' : '';?>>Carael</option>
									<option value="Danacbunga"<?=$brgy == 'DANACBUNGA' ? ' selected="selected"' : '';?>>Danacbunga</option>
									<option value="Maguisguis"<?=$brgy == 'MAGUISGUIS' ? ' selected="selected"' : '';?>>Maguisguis</option>
									<option value="Malomboy"<?=$brgy == 'MALOMBOY' ? ' selected="selected"' : '';?>>Malomboy</option>
									<option value="Mambog"<?=$brgy == 'MAMBOG' ? ' selected="selected"' : '';?>>Mambog</option>
									<option value="Moraza"<?=$brgy == 'MORAZA' ? ' selected="selected"' : '';?>>Moraza</option>
									<option value="Nacolcol"<?=$brgy == 'NACOLCOL' ? ' selected="selected"' : '';?>>Nacolcol</option>
									<option value="Owaog-Nibloc"<?=$brgy == 'OWAOG-NIBLOC' ? ' selected="selected"' : '';?>>Owaog-Nibloc</option>
									<option value="Paco (poblacion)"<?=$brgy == 'PACO (POBLACION)' ? ' selected="selected"' : '';?>>Paco (poblacion)</option>
									<option value="Palis"<?=$brgy == 'PALIS' ? ' selected="selected"' : '';?>>Palis</option>
									<option value="Panan"<?=$brgy == 'PANAN' ? ' selected="selected"' : '';?>>Panan</option>
									<option value="Parel"<?=$brgy == 'PAREL' ? ' selected="selected"' : '';?>>Parel</option>
									<option value="Paudpod"<?=$brgy == 'PAUDPOD' ? ' selected="selected"' : '';?>>Paudpod</option>
									<option value="Poonbato"<?=$brgy == 'POONBATO' ? ' selected="selected"' : '';?>>Poonbato</option>
									<option value="Porac"<?=$brgy == 'PORAC' ? ' selected="selected"' : '';?>>Porac</option>
									<option value="San Isidro"<?=$brgy == 'SAN ISIDRO' ? ' selected="selected"' : '';?>>San Isidro</option>
									<option value="San Juan"<?=$brgy == 'SAN JUAN' ? ' selected="selected"' : '';?>>San Juan</option>
									<option value="San Miguel"<?=$brgy == 'SAN MIGUEL' ? ' selected="selected"' : '';?>>San Miguel</option>
									<option value="Santiago"<?=$brgy == 'SANTIAGO' ? ' selected="selected"' : '';?>>Santiago</option>
									<option value="Tampo (poblacion)"<?=$brgy == 'TAMPO (POBLACION)' ? ' selected="selected"' : '';?>>Tampo (poblacion)</option>
									<option value="Taugtog"<?=$brgy == 'TAUGTOG' ? ' selected="selected"' : '';?>>Taugtog</option>
									<option value="Villar"<?=$brgy == 'VILLAR' ? ' selected="selected"' : '';?>>Villar</option>
								</select>
								<div class="invalid-feedback">Please Choose the Barangay.</div>
							</div>
							<?php }else{ ?>

								<div class="form-group col-md-6 col-sm-12">
									<label for="inputBrgy">Barangay</label>
								<input type="text" class="form-control text-uppercase" id="inputAddress" name="inputBrgy" placeholder="1234 Main St." value="<?php echo $_SESSION['brgy']; ?>" readonly></div>
							<?php } ?>

							<div class="form-group col-md-6">
								<label for="inputAddress">Land Size(in hectares)</label>
								<input type="number" class="form-control" id="inputLandSize" name="inputLandSize" step="any" placeholder="Land Size" value="<?php echo $land_size; ?>" <?php echo canEditField($_SESSION['role'], 'land_size') ? '' : 'readonly'; ?> required>

									<small id="brgyHelp" class="form-text text-muted">1 hectare = 10,000m<sup>2</sup></small>
								<div class="invalid-feedback">Please Fill up the Land Size.</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputStatus">Field's Status</label>
								<select class="form-control text-uppercase" id="inputStatus" name="inputStatus" <?php echo canEditField($_SESSION['role'], 'status') ? '' : 'readonly'; ?> required>
								    <option value="">Choose options</option>
								    <option value="ACTIVE"<?=$status == 'ACTIVE' ? ' selected="selected"' : '';?>>ACTIVE</option>
								    <option value="INACTIVE"<?=$status == 'INACTIVE' ? ' selected="selected"' : '';?>>INACTIVE</option>
								</select>

							</div>
							
							<div class="form-group col-md-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" required>
									<label class="form-check-label" for="gridCheck">
									Please Double Check the Information before Submitting.
									</label>
									<div class="invalid-feedback">Please TICK the checkbox.</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div id="divImageMediaPreview" class="col-md-12 mb-3">
								<?php if ($image != "") {?>
								<img class="rounded" src="img/farmers/<?php echo $image;?>" style="width: 100%;">
								<?php } else { ?>
								<img class="img_placeholder rounded" src="" style="width: 100%;">
								<?php }?>
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputupload" name="inputupload" aria-describedby="inputuploadAddon" <?php echo canEditField($_SESSION['role'], 'inputupload') ? '' : 'disabled'; ?>>
									<label class="custom-file-label" for="inputupload">Choose file</label>
								</div>
							</div>

						</div>
					</div>
					<form id="myForm">
					    <div class="form-group col-md-12">
					    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
					    <?php if ($farmer_id != "") { 
					        // Check if delete_flag is 0 before showing the Restore button
					        $checkDeleteFlagQuery = "SELECT delete_flag FROM farmers WHERE farmer_id = $farmer_id";
					        $deleteFlagResult = mysqli_query($con, $checkDeleteFlagQuery);
					        $deleteFlagRow = mysqli_fetch_assoc($deleteFlagResult);

					        if ($deleteFlagRow['delete_flag'] == 1) { ?>
					            <button type="button" class="btn btn-warning" onclick="restoreData()">Restore</button>
					        <?php }
					    } ?>
					</div>
					</form>
				</form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php include "include/footer.php"; ?>
<!-- End of Footer -->


<script>
    function restoreData() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will restore the deleted data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, restore it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url: 'restore_farmer.php',
                    method: 'POST',
                    data: { farmer_id: <?php echo $farmer_id; ?> },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Restored!',
                                text: 'The data has been restored.',
                                icon: 'success'
                            }).then(() => {
                                window.location.href = 'farmers.php';
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message || 'Failed to restore data.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to communicate with the server.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>
