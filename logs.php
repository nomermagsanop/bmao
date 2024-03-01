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
                        <h1 class="h3 mb-0 text-gray-800">Logs</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User's Logs</h6>
                                </div>
                                <!-- Card Body -->
								<div class="card-body">
									<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Created By</th>
            <th scope="col">Farmers Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Emergency #</th>
            <th scope="col">Date Created</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $display_logs = "SELECT * FROM logs ORDER BY created_at DESC";
            $sqlQuery = mysqli_query($con, $display_logs) or die(mysqli_error($con));

            while($row = mysqli_fetch_array($sqlQuery)) {
                $log_id = $row['log_id'];
                $staff_id = $row['staff_id'];
                $farmer_id = $row['farmer_id'];
                $contact = $row['contact'];
                $emergency_contact = $row['emergency_contact'];
                $created_at = $row['created_at'];

                // Fetching staff information
                $staff_query = "SELECT first_name, middle_name, last_name, extension_name FROM staffs WHERE staff_id = $staff_id";
                $staff_result = mysqli_query($con, $staff_query);
                $staff_data = mysqli_fetch_array($staff_result);

                // Fetching farmer information
                $farmer_query = "SELECT first_name, middle_name, last_name, extension_name FROM farmers WHERE farmer_id = $farmer_id";
                $farmer_result = mysqli_query($con, $farmer_query);
                $farmer_data = mysqli_fetch_array($farmer_result);
                 $formatted_date = date("F j, Y, g:i a", strtotime($created_at));
        ?>
                <tr>
                    <td><?php echo $staff_data['first_name'].' '.$staff_data['middle_name'].' '.$staff_data['last_name'].' '.$staff_data['extension_name']; ?></td>
                    <td><?php echo $farmer_data['first_name'].' '.$farmer_data['middle_name'].' '.$farmer_data['last_name'].' '.$farmer_data['extension_name']; ?></td>
                    <td><?php echo $contact; ?></td>
                    <td><?php echo $emergency_contact; ?></td>
                    <td><?php echo $formatted_date; ?></td>
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