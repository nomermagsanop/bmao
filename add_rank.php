<?php 
$title = "Botolan Municipal Agriculture Office - Add New Farmer";
include "include/header.php";
require 'database_connection.php';

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
header("Location: 404.php");
exit();
}


$rank_id = isset($_GET['rank_id']) ? $_GET['rank_id'] :'';
$rank_name = "";
$rank_description = "";
if($rank_id != ""){
$display_Ranks = "SELECT * FROM ranks WHERE rank_id = $rank_id";
$sqlQuery = mysqli_query($con, $display_Ranks) or die( mysqli_error($con));
while($row = mysqli_fetch_array($sqlQuery)){
$rank_id = $row['rank_id'];
$rank_name = $row['rank_name'];
$rank_description = $row['rank_description'];

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
					<?php if($rank_id != "") { ?>
		            <h1 class="h3 mb-0 text-gray-800">Edit Ranks</h1>
					<?php } else { ?>
		            <h1 class="h3 mb-0 text-gray-800">Add New Ranks</h1>
					<?php } ?>
		        </div>
						<div class="row">
		            <!-- Area Chart -->
		            <div class="col-xl-12 col-lg-12">
		                <div class="card shadow mb-4">
		                    <!-- Card Header - Dropdown -->
		                    <div
		                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                        <h6 class="m-0 font-weight-bold text-primary">Ranks's Informations:</h6>
		                    </div>
		                    <!-- Card Body -->
		                    <div class="card-body">
								<?php if(isset($_GET['rank_id'])) {?>
								<form id="program_form" class="needs-validation" novalidate="" action="update_rank.php" method="POST" enctype="multipart/form-data">
								<?php } else {?>
								<form id="program_form" class="needs-validation" novalidate="" action="save_rank.php" method="POST" enctype="multipart/form-data">
								<?php }?>
						         <div class="row">
									  <div class="col-sm-12">  
										<div class="form-group">		
										<label for="inputRankname">Ranks Name</label>
										<input type="hidden" class="form-control" id="rank_id" name="rank_id"  value="<?php echo isset($_GET['rank_id']) ? $_GET['rank_id'] :'';?>">
										<input type="text" class="form-control text-uppercase" id="inputRankname" name="inputRankname" placeholder="Rank Name" value="<?php if($rank_name != ""){echo $rank_name;}?>" required>
										<div class="invalid-feedback">Please Fill up the Ranks Name.</div>
									</div>
								</div>
							  </div>
								<div class="row">
										<div class="col-sm-12">  
											<div class="form-group">
												<label for="inputRankdescription">Ranks Description</label>
												<textarea class="form-control" id="inputRankdescription" name="inputRankdescription" placeholder="Enter Rank Description" rows="7" required><?php if($rank_description != ""){echo $rank_description;}?></textarea>
			                                   <div class="invalid-feedback">Please Fill up the Ranks Description.</div>
											  </div>
										</div>
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