<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Records";

include "include/header.php";


?>

<script src="table2excel.js"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Upcoming Events</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                 
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Upcoming Events</h6>
                                </div>
                                <!-- Card Body -->
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th scope="col">Event Name</th>
													<th scope="col">Start Date</th>
													<th scope="col">End Date</th>
													<th scope="col">Barangay Paricipants</th>
													  <?php if ($_SESSION['role'] !== 'BARANGAY STAFF') : ?>
													<th scope="col">Action</th>
													  <?php endif; ?>
												</tr>
											</thead>
											<tbody>


										
	<?php
	$currentDate = date("Y-m-d"); // Get the current date

	$sqlQuery = mysqli_query($con, "SELECT * FROM calendar_event_master WHERE status='PENDING' AND event_start_date >= '$currentDate'");

	while ($row = mysqli_fetch_array($sqlQuery)) 
	{

	$program_id = $row['program_id'];
	$program = ''; // Initialize the $rank variable

	$get_program = "SELECT * FROM programs WHERE program_id = '$program_id'";
	$run_data = mysqli_query($con, $get_program);

	if ($run_data && mysqli_num_rows($run_data) > 0) {
	    $row1 = mysqli_fetch_assoc($run_data);
	    $program = $row1['prog_name'];
	 }
		$event_id = $row['event_id'];
		
		$event_start_date = $row['event_start_date'];
		$event_end_date = $row['event_end_date'];
		$event_location = unserialize($row['event_location']);
		$event_description = $row['event_description'];
		$brgy = array(
		"BANCAL" => "BANCAL", "BANGAN" => "BANGAN", "BATONLAPOC" => "BATONLAPOC", "BELBEL" => "BELBEL",
		"BENEG" => "BENEG", "BINUCLUTAN" => "BINUCLUTAN", "BURGOS" => "BURGOS", "CABATUAN" => "CABATUAN",
		"CAPAYAWAN" => "CAPAYAWAN", "CARAEL" => "CARAEL", "DANACBUNGA" => "DANACBUNGA", "MAGUISGUIS" => "MAGUISGUIS",
		"MALOMBOY" => "MALOMBOY", "MAMBOG" => "MAMBOG", "MORAZA" => "MORAZA", "NACOLCOL" => "NACOLCOL",
		"OWAOG-NIBLOC" => "OWAOG-NIBLOC", "PACO (POBLACION)" => "PACO (POBLACION)", "PALIS" => "PALIS",
		"PANAN" => "PANAN", "PAREL" => "PAREL", "PAUDPOD" => "PAUDPOD", "POONBATO" => "POONBATO",
		"PORAC" => "PORAC", "SAN ISIDRO" => "SAN ISIDRO", "SAN JUAN" => "SAN JUAN", "SAN MIGUEL" => "SAN MIGUEL",
		"SANTIAGO" => "SANTIAGO", "TAMPO (POBLACION)" => "TAMPO (POBLACION)", "TAUGTOG" => "TAUGTOG", "VILLAR" => "VILLAR"
		);
		?>
		<tr>
		  <td><?php echo $program; ?></td>
		   <td><?php echo date("Y-m-d", strtotime($event_start_date)); ?></td>
		   <td><?php echo date("Y-m-d", strtotime($event_end_date)); ?></td>
		   <td><?php foreach ($event_location as $value) {echo $value . ", ";}?></td>
		   <?php if ($_SESSION['role'] !== 'BARANGAY STAFF') : ?>
		    <td class="text-center">
		    <a href="#" onclick="confirmEndingEvent(<?php echo $event_id; ?>)" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-check"></i> Done</a>
	      </td>
	      <?php endif; ?>
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




  
    <script src="record_print.js"></script>

<!-- Footer -->
<?php include "include/footer.php"; ?>
<!-- End of Footer -->



<!-- Include SweetAlert2 CSS and JS files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
function confirmEndingEvent(eventId) {
    // Use SweetAlert2 for a confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to mark this event as done?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark as done!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show a success message
            Swal.fire({
                title: 'Success!',
                text: 'This event has been successfully marked as done and inserted in records.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirect to the update_upcoming_eventsucess.php with the event_id parameter
                window.location.href = 'update_upcoming_eventsucess.php?event_id=' + eventId;
            });
        }
    });
}
</script>
