<?php 
$title = "Botolan Municipal Agriculture Office - Add New Personnel";

include "include/header.php";

require 'database_connection.php';

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}


$personnel_id = isset($_GET['personnel_id']) ? $_GET['personnel_id'] :'';


$first_name = "";
$middle_name = "";
$last_name = "";
$extension_name = "";
$dob = "";
$sex = "";
$email = "";
$contact = "";
$user = "";
$address = "";
$brgy = "";
$mun = "";
$rank_id = "";
$image = "";


if($personnel_id != ""){

$display_personnel = "SELECT * FROM personnel WHERE personnel_id = $personnel_id";
$sqlQuery = mysqli_query($con, $display_personnel) or die( mysqli_error($con));

while($row = mysqli_fetch_array($sqlQuery)){
$personnel_id = $row['personnel_id'];
$first_name = $row['first_name'];
$middle_name = $row['middle_name'];
$last_name = $row['last_name'];
$extension_name = $row['extension_name'];
$dob = $row['dob'];
$sex = $row['sex'];
$email = $row['email'];
$contact = $row['contact'];
$address = $row['address'];
$brgy = $row['brgy'];
$mun = $row['mun'];
$rank_id = $row['rank_id'];

$image = $row['upload_url'];
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
				<?php if($personnel_id != "") { ?>
				<h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
				<?php } else { ?>
					<?php if($personnel_id != "") { ?>
					<h1 class="h3 mb-0 text-gray-800">Edit Personnel</h1>
					<?php } else { ?>
					<h1 class="h3 mb-0 text-gray-800">Add New Personnel</h1>
					<?php } ?>
				<?php } ?>
            </div>
			
			<div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Personnel's Informations:</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
							<?php if(isset($_GET['personnel_id'])) {?>
								<form id="personnel_form" class="needs-validation" novalidate="" action="update_personnel.php" method="POST" enctype="multipart/form-data">
							<?php } else {?>
								<form id="personnel_form" class="needs-validation" novalidate="" action="save_personnel.php" method="POST" enctype="multipart/form-data">
							<?php }?>
								<div class="row">
									<div class="row col-md-10 col-sm-12">
										<div class="form-group col-md-4 col-sm-12">
											<label for="inputfName">First Name</label>
											<input type="hidden" class="form-control" id="personnel_id" name="personnel_id"  value="<?php echo isset($_GET['personnel_id']) ? $_GET['personnel_id'] :'';?>">
											<input type="text" class="form-control text-uppercase" id="inputfName" name="inputfName" placeholder="First Name" value="<?php if($first_name != ""){echo $first_name;}?>" required>
											<div class="invalid-feedback">Please Fill up the First Name.</div>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="inputmName">Middle Name</label>
											<input type="text" class="form-control text-uppercase" id="inputmName" name="inputmName" placeholder="Middle Name" value="<?php if($middle_name != ""){echo $middle_name;}?>" required>
											<div class="invalid-feedback">Please Fill up the Middle Name.</div>
										</div>
										<div class="form-group col-md-4 col-sm-12">
											<label for="inputlName">Last Name</label>
											<input type="text" class="form-control text-uppercase" id="inputlName" name="inputlName" placeholder="Last Name" value="<?php if($last_name != ""){echo $last_name;}?>" required>
											<div class="invalid-feedback">Please Fill up the Last Name.</div>
										</div>
										<div class="form-group col-md-1 col-sm-12">
											<label for="inputeName">Extension</label>
											<select class="form-control text-uppercase" id="inputeName" name="inputeName" >
												<option value="">Extension Name</option>
												<option value="jr"<?=$extension_name == 'jr' ? ' selected="selected"' : '';?>>Jr.</option>
												<option value="i"<?=$extension_name == 'i' ? ' selected="selected"' : '';?>>I</option>
												<option value="ii"<?=$extension_name == 'ii' ? ' selected="selected"' : '';?>>II</option>
												<option value="iii"<?=$extension_name == 'iii' ? ' selected="selected"' : '';?>>III</option>
												<option value="iv"<?=$extension_name == 'iv' ? ' selected="selected"' : '';?>>IV</option>
												<option value="v"<?=$extension_name == 'v' ? ' selected="selected"' : '';?>>V</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="inputdob">Date of Birth</label>
											<input type="date" class="form-control text-uppercase" id="inputdob" name="inputdob" placeholder="Date of Birth" value="<?php if($dob != ""){echo $dob;}?>" required>
											<div class="invalid-feedback">Please Fill up the Date of Birth.</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputsex">Sex</label>
											<select class="form-control text-uppercase" id="inputsex" name="inputsex" required>
												<option value="">Choose options</option>
												<option value="Male"<?=$sex == 'MALE' ? ' selected="selected"' : '';?>>Male</option>
												<option value="Female"<?=$sex == 'FEMALE' ? ' selected="selected"' : '';?>>Female</option>
											</select>
											<div class="invalid-feedback">Please Choose the Sex.</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputEmail">Email</label>
											<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php if($email != ""){echo $email;}?>" required>
											<div class="invalid-feedback">Please Fill up the Email Address.</div>
										</div>
										<div class="form-group column col-md-6">
											<label for="inputContact">Contact Number</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="country_code">+63</span>
												</div>
												<input type="text" class="form-control text-uppercase" id="inputContact" name="inputContact" placeholder="9XX XXX XXXX" aria-describedby="country_code" value="<?php if($contact != ""){echo $contact;}?>" required>
												<div class="invalid-feedback">Please Fill up the Contact Number.</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress">Street</label>
											<input type="text" class="form-control text-uppercase" id="inputAddress" name="inputAddress" placeholder="1234 Main St" value="<?php if($address != ""){echo $address;}?>" required>
											<div class="invalid-feedback">Please Fill up the Address.</div>
										</div>

										<div class="form-group col-md-6 col-sm-12">
											<label for="inputBrgy">Barangay</label>
											<select class="form-control text-uppercase" id="inputBrgy" name="inputBrgy" required>
												<option value="">Choose options</option>
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
								
										<div class="form-group col-md-6 col-sm-12">
											<label for="inputMun">Municipal</label>
											<select class="form-control text-uppercase" id="inputMun" name="inputMun" required>
												<option value="">Choose options</option>
												<option value="BOTOLAN"<?=$mun == 'BOTOLAN' ? ' selected="selected"' : '';?>>BOTOLAN</option>
												<option value="CABANGAN"<?=$mun == 'CABANGAN' ? ' selected="selected"' : '';?>>CABANGAN</option>
												<option value="CANDELARIA"<?=$mun == 'CANDELARIA' ? ' selected="selected"' : '';?>>CANDELARIA</option>
												<option value="CASTILLEJOS"<?=$mun == 'CASTILLEJOS' ? ' selected="selected"' : '';?>>CASTILLEJOS</option>
												<option value="IBA"<?=$mun == 'IBA' ? ' selected="selected"' : '';?>>IBA</option>
												<option value="MASINLOC"<?=$mun == 'MASINLOC' ? ' selected="selected"' : '';?>>MASINLOC</option>
												<option value="PALAUIG"<?=$mun == 'PALAUIG' ? ' selected="selected"' : '';?>>PALAUIG</option>
												<option value="SAN ANTONIO"<?=$mun == 'SAN ANTONIO' ? ' selected="selected"' : '';?>>SAN ANTONIO</option>
												<option value="SAN FELIPE"<?=$mun == 'SAN FELIPE' ? ' selected="selected"' : '';?>>SAN FELIPE</option>
												<option value="SAN MARCELINO"<?=$mun == 'SAN MARCELINO' ? ' selected="selected"' : '';?>>SAN MARCELINO</option>
												<option value="SAN NARCISO"<?=$mun == 'SAN NARCISO' ? ' selected="selected"' : '';?>>SAN NARCISO</option>
												<option value="SANTA CRUZ"<?=$mun == 'SANTA CRUZ' ? ' selected="selected"' : '';?>>SANTA CRUZ</option>
												<option value="SUBIC"<?=$mun == 'SUBIC' ? ' selected="selected"' : '';?>>SUBIC</option>

											</select>
											<div class="invalid-feedback">Please Choose the Municipality.</div>
										</div>
									    <div class="form-group col-md-6">
									        <label for="inputRank_id">Rank</label>
									        <select name="inputRank_id" class="form-control" required>
									            <option value="" selected disabled>Select Rank</option>
									            <?php
									            // Include the SelectOption class file
									            require 'fetch_rank.php';

									            // Create an instance of the SelectOption class
									            $selectOption = new Selectrank();

									            // Get the class options
									            $rankOptions = $selectOption->getRankOptions();

									            echo $rankOptions;
									            ?>
									        </select>
									        <div class="invalid-feedback">Please Select Rank.</div>
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
											<img class="rounded" src="img/personnel/<?php echo $image;?>" style="width: 100%;">
											<?php } else { ?>
											<img class="img_placeholder rounded" src="" style="width: 100%;">
											<?php }?>
										</div>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="inputupload" name="inputupload" aria-describedby="inputuploadAddon">
												<label class="custom-file-label" for="inputupload">Choose file</label>
											</div>
										</div>
									</div>
									
									<form id="myForm">
								    <!-- Your form fields go here -->
								    <div class="form-group col-md-12">
								        <button type="submit" class="btn btn-primary">Submit</button>
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