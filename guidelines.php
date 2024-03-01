<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Guidelines";

include "include/header.php";
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
                        <h1 class="h3 mb-0 text-gray-800">Guidelines</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Guidelines</h6>
                                </div>
                                <!-- Card Body -->
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th scope="col">Farmer's Name</th>
													<th scope="col">Land Size (in Hectares)</th>
													<th scope="col">Land Size (in m<sup>2</sup>)</th>
													<th scope="col">Seeds (Organic)</th>
													<th scope="col">Seeds (Hybrid)</th>
													<th scope="col">Fertilizer (in 50kg/Bags)</th>
													<th scope="col">Nitrogen (in 200g/Pack)</th>
												</tr>
											</thead>
											<!-- <tfoot>
												<tr>
													<th scope="col">Farmer's Name</th>
													<th scope="col">Land Size (in Hectares)</th>
													<th scope="col">Land Size (in m<sup>2</sup>)</th>
													<th scope="col">Seeds (Organic)</th>
													<th scope="col">Seeds (Hybrid)</th>
													<th scope="col">Fertilizer (in 50kg/Bags)</th>
													<th scope="col">Nitrogen (in 200g/Pack)</th>
												</tr>
											</tfoot> -->
											<tbody>

												<?php
// Check if the user has the role "BARANGAY STAFF"
if ($_SESSION['role'] == 'BARANGAY STAFF') {
    // Retrieve the barangay information for the logged-in user
    $userBrgy = $_SESSION['brgy'];

    // Modify the query to filter by the user's barangay
    $display_farmers = "SELECT * FROM farmers WHERE delete_flag = 0 AND brgy = '$userBrgy'";
} else {
    // The user doesn't have the role "BARANGAY STAFF," display all farmers
    $display_farmers = "SELECT * FROM farmers WHERE delete_flag = 0";

    // Modify the query to filter by barangay if it's selected
    if (!empty($brgy)) {
        $display_farmers .= " AND brgy = '$brgy'";
    }
}

$sqlQuery = mysqli_query($con, $display_farmers) or die(mysqli_error($con));
												
												while($row = mysqli_fetch_array($sqlQuery)){
													$first_name = $row['first_name'];
													$middle_name = $row['middle_name'];
													$last_name = $row['last_name'];
													$extension_name = $row['extension_name'];
													$contact = $row['contact'];
													$land_size = $row['land_size'];
													$status = $row['status'];


												?>
													<tr>
														<td>
															<span><?php echo $first_name . " " . $middle_name . " " . $last_name . " " . $extension_name ?></span>
														</td>
														<td><?php echo $land_size; ?></td> <!-- landsize in hectare -->
														<td><?php echo number_format($land_size*10000); ?></td><!-- landsize in metersquared -->
														<td><?php echo (ceil($land_size / 0.35) * 5) . "kg"; ?></td><!-- organic seeds -->
														<td><?php echo (ceil($land_size / 0.35) * 5) . "kg"; ?></td><!-- hybrid seeds -->
														<td><?php echo ceil($land_size / 0.5); ?></td><!-- Fertilizer -->
														<td><?php echo ceil(($land_size*10000) / 2000); ?></td><!-- Nitrogen -->
													</tr>

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