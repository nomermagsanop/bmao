<?php 
$title = "Botolan Municipal Agriculture Office - Add New Farmer";

include "include/header.php";

require 'database_connection.php';

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}



$program_id = isset($_GET['program_id']) ? $_GET['program_id'] :'';

$prog_name = "";
$prog_descrip = "";
$status = "";
$prog_loc = "";
$image = "";

if($program_id != ""){

$display_programs = "SELECT * FROM programs WHERE program_id = $program_id";
$sqlQuery = mysqli_query($con, $display_programs) or die( mysqli_error($con));

while($row = mysqli_fetch_array($sqlQuery)){
$program_id = $row['program_id'];
$prog_name = $row['prog_name'];
$prog_descrip = $row['prog_descrip'];
$status = $row['status'];
$prog_loc = $row['prog_loc'];
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
					<?php if($program_id != "") { ?>
                    <h1 class="h3 mb-0 text-gray-800">Edit Programs</h1>
					<?php } else { ?>
                    <h1 class="h3 mb-0 text-gray-800">Add New Programs</h1>
					<?php } ?>
                </div>
				
				<div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Programs's Informations:</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

							<?php if(isset($_GET['program_id'])) {?>
							<form id="program_form" class="needs-validation" novalidate="" action="update_program.php" method="POST" enctype="multipart/form-data">
							<?php } else {?>
							<form id="program_form" class="needs-validation" novalidate="" action="save_program.php" method="POST" enctype="multipart/form-data">
							<?php }?>

						     <div class="row">
							    <div class="col-sm-12">  
										<div class="form-group">		
										<label for="inputProgramname">Programs Name</label>
										<input type="hidden" class="form-control" id="program_id" name="program_id"  value="<?php echo isset($_GET['program_id']) ? $_GET['program_id'] :'';?>">
										<input type="text" class="form-control text-uppercase" id="inputProgramname" name="inputProgramname" placeholder="Program Name" value="<?php if($prog_name != ""){echo $prog_name;}?>" required>
										<div class="invalid-feedback">Please Fill up the Programs Name.</div>
									</div>
								</div>
							</div>														
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="inputProgramdescrip">Programs Description</label>
										<textarea class="form-control " id="inputProgramdescrip" name="inputProgramdescrip" placeholder="Enter Program Description" rows="7" required><?php if($prog_descrip != ""){echo $prog_descrip;}?></textarea>
                                       <div class="invalid-feedback">Please Fill up the Programs Description.</div>
									  </div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="inputProgramloc">Programs Location</label>
										<textarea class="form-control " id="inputProgramloc" name="inputProgramloc" placeholder="Enter Program Location" rows="1"required><?php if($prog_loc != ""){echo $prog_loc;}?></textarea>
                                       <div class="invalid-feedback">Please Fill up the Programs Location.</div>
									  </div>
								</div>
							</div>								
                            <div class="row">
								<div class="form-group col-md-6">
									<label for="inputProgramstatus">Program's Status</label>
									    <select class="form-control text-uppercase" id="inputProgramstatus" name="inputProgramstatus" required>
											<option value="">Choose options</option>
											<option value="ACTIVE"<?=$status == 'ACTIVE' ? ' selected="selected"' : '';?>>ACTIVE</option>
											<option value="INACTIVE"<?=$status == 'INACTIVE' ? ' selected="selected"' : '';?>>INACTIVE</option>
								        </select>
								</div>									
						   	    <div class="form-group col-md-6">
								    <label for="inputProgramstatus">Choose Image</label>
										<div class="input-group mb-3">
										  <div class="custom-file">
											<input type="file" class="custom-file-input" id="inputupload" name="inputupload" aria-describedby="inputuploadAddon">
											<label class="custom-file-label" for="inputupload">Choose Image..</label>
										 </div>
									   </div>	
									   <div id="divImageMediaPreview" class="col-md-4 mb-3">
									  	<?php if ($image != "") {?>
										  <img class="rounded" src="img/programs/<?php echo $image;?>" style="width: 100%;">
										   <?php } else { ?>
										  <img class="img_placeholder rounded" src="" style="width: 100%;">
										<?php }?>
									  </div>											
							      	<div class="form-check">
									  <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" required>
									    <label class="form-check-label" for="gridCheck">
									       Please Double Check the Information before Submitting.
									   </label>
									 <div class="invalid-feedback">Please TICK the checkbox.</div>
								    </div>
							
								   <div class="form-group col-md-12">
										<button type="submit" class="btn btn-primary">Submit</button>
										<?php if ($program_id != "") { 
								        // Check if delete_flag is 0 before showing the Restore button
								        $checkDeleteFlagQuery = "SELECT delete_flag FROM programs WHERE program_id = $program_id";
								        $deleteFlagResult = mysqli_query($con, $checkDeleteFlagQuery);
								        $deleteFlagRow = mysqli_fetch_assoc($deleteFlagResult);

								        if ($deleteFlagRow['delete_flag'] == 1) { ?>
								            <button type="button" class="btn btn-warning" onclick="restoreData()">Restore</button>
							        <?php }} ?>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
     </div>
      <!-- /.container-fluid -->    
  </div>
        <!-- End of Main Content -->
</div>
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
                url: 'restore_program.php',
                method: 'POST',
                data: { program_id: <?php echo $program_id; ?> },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Restored!',
                            text: 'The data has been restored.',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'programs.php';
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
