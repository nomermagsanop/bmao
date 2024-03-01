<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Farmers";

include "include/header.php"; 
// Assuming you have a user role stored in the session
$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

// Check if the user's role is 'BARANGAY STAFF'
if ($userRole === 'BARANGAY STAFF') {
    // Redirect to 404.php or any other page
    header("Location: 404.php");
    exit();
}
?>

<?php if(isset($_SESSION['success'])){ ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?php echo $_SESSION['success'];?>'
    });
});
</script>
<?php }unset($_SESSION['success']) ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Personnels</h1>
					
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Personnels</h6>
                                    <a href="add_personnel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
                                </div>
                                <!-- Card Body -->
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th scope="col">Image</th>
													<th scope="col">Name</th>
													<th scope="col">Contact No.</th>
													<th scope="col">Rank</th>
												</tr>
											</thead>
											<tbody>

													<?php
													$display_personnel = "SELECT * FROM personnel";
													$sqlQuery = mysqli_query($con, $display_personnel) or die(mysqli_error($con));

													
													while($row = mysqli_fetch_array($sqlQuery))
													{

										 
													$rank_id = $row['rank_id'];
												    $rank = ''; // Initialize the $rank variable

												    $get_rank = "SELECT * FROM ranks WHERE rank_id = '$rank_id'";
												    $run_data = mysqli_query($con, $get_rank);

												    if ($run_data && mysqli_num_rows($run_data) > 0) {
												        $row1 = mysqli_fetch_assoc($run_data);
												        $rank = $row1['rank_name'];
	                                                 }


													$personnel_id = $row['personnel_id'];
													$first_name = $row['first_name'];
													$middle_name = $row['middle_name'];
													$last_name = $row['last_name'];
													$extension_name = $row['extension_name'];
													$contact = $row['contact'];
													$sex = $row['sex'];
													

													$image = $row['upload_url'];

												?>
													<tr>
														<td><?php
															if($image != "") { ?>
																<img class="mx-auto d-block rounded" src="img/personnel/<?php echo $image; ?>" width="50">
															<?php }else {
																if($sex == "MALE") {
																?>
																<img class="mx-auto d-block rounded" src="img/undraw_profile_2.svg" width="50">
																<?php } else if($sex == "FEMALE") {?>
																<img class="mx-auto d-block rounded" src="img/undraw_profile_1.svg" width="50">
															<?php }
															} ?>
														</td>
														<td class="full_name">
															<span><a class="text-info" href="add_personnel.php?personnel_id=<?php echo $personnel_id; ?>"><?php echo $first_name . " " . $middle_name . " " . $last_name . " " . $extension_name ?></a></span>
															<div>
																<ul>
																	<li><a href="add_personnel.php?personnel_id=<?php echo $personnel_id; ?>">Edit</a></li>
																	<li><a href='#delete_<?php echo $personnel_id; ?>' data-toggle='modal'>Delete</a></li>


																</ul>
															</div>
														</td>
														<td><?php echo $contact; ?></td>
														<td><?php echo $rank; ?></td>
													</tr>
														<?php include 'delete_modal.php'; ?>
												<?php } ?>


											</tbody>
										</table>
									</div>
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