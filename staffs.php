<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Farmers";

include "include/header.php"; 

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF' || $userRole === 'OFFICE STAFF') {
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
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
					
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
                                    <?php if ($_SESSION['role'] == "ADMINISTRATOR") { ?>	
                                    <a href="add_staff.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Users</a><?php } ?>
                                </div>
                                <!-- Card Body -->
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th scope="col">Image</th>
													<th scope="col">Name</th>
													<th scope="col">Barangay</th>
													<th scope="col">Contact No.</th>
													<th scope="col">Role</th>
												</tr>
											</thead>
											<tbody>

												<?php
													$display_staffs = "SELECT * FROM staffs";
													$sqlQuery = mysqli_query($con, $display_staffs) or die(mysqli_error($con));
												
												while($row = mysqli_fetch_array($sqlQuery)){
													$staff_id = $row['staff_id'];
													$first_name = $row['first_name'];
													$middle_name = $row['middle_name'];
													$last_name = $row['last_name'];
													$extension_name = $row['extension_name'];
													$sex = $row['sex'];
													$contact = $row['contact'];
													$brgy = $row['brgy'];
													$role = $row['role'];

													$image = $row['upload_url'];

												?>
													<tr>
														<td><?php
															if($image != "") { ?>
																<img class="mx-auto d-block rounded" src="img/staffs/<?php echo $image; ?>" width="50">
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
															<span><a class="text-info" href="add_staff.php?staff_id=<?php echo $staff_id; ?>"><?php echo $first_name . " " . $middle_name . " " . $last_name . " " . $extension_name ?></a></span>
															<div>
																<ul>
																	<li><a href="add_staff.php?staff_id=<?php echo $staff_id; ?>">Edit</a></li>
																	<li><a href='#delete_<?php echo $staff_id; ?>' data-toggle='modal'>Delete</a></li>


																</ul>
															</div>
														</td>
														<td><?php echo $contact; ?></td>
														<td><?php echo $brgy; ?></td>
														<td><?php echo $role; ?></td>
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