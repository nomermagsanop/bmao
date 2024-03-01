<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Records";

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


<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Check for success message -->
<?php if (isset($_SESSION['success_message'])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?php echo $_SESSION['success_message']; ?>',
        });
    </script>
    <?php unset($_SESSION['success_message']); // Clear the session message ?>
<?php endif; ?>

<!-- Check for error message -->
<?php if (isset($_SESSION['error_message'])): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $_SESSION['error_message']; ?>',
        });
    </script>
    <?php unset($_SESSION['error_message']); // Clear the session message ?>
<?php endif; ?>


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
                        <h1 class="h3 mb-0 text-gray-800">Records</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                 
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Recorded Events</h6><button id ="downloadexcel" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Export</button>
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
													<th scope="col">Action</th>
												</tr>
											</thead>
											<!-- <tfoot>
												<tr>
													<th scope="col">Event Name</th>
													<th scope="col">Start Date</th>
													<th scope="col">End Date</th>
													<th scope="col">Event Locations</th>
													<th scope="col">Event Description</th>
												</tr>
											</tfoot> -->
											<tbody>

<?php
$display_records = mysqli_query($con, "SELECT * FROM calendar_event_master WHERE status='ACCOMPLISHED'");

if (!$display_records) {
    die("Error: " . mysqli_error($con));
}
while ($row = mysqli_fetch_array($display_records)) {
    
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


        <td class="text-center">
            <a href="print_event.php?event_id=<?php echo $event_id; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                <i class="fa fa-print"></i> Print
            </a>
            <a href="#" onclick="deleteEvent(<?php echo $event_id; ?>)" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
    <i class="fa fa-trash"></i> Delete </a>

        </td>
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
<script>
	document.getElementById('downloadexcel').addEventListener('click', function () {
		var table = document.getElementById("dataTable");

		// Exclude the index of the column you want to exclude (e.g., 4 for the "Action" column)
		var excludedColumnIndex = 4;

		var rows = table.rows;
		for (var i = 0; i < rows.length; i++) {
			rows[i].deleteCell(excludedColumnIndex);
		}

		var table2excel = new Table2Excel();
		table2excel.export(table);
	});
</script>

\
<!-- DELETE RECORDS -->

<script>
function deleteEvent(eventId) {
    // Use SweetAlert2 for a confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request
            $.ajax({
                url: 'delete_event.php',
                type: 'POST',
                dataType: 'json',
                data: { event_id: eventId },
                success: function(response) {
                    if (response.status) {
                        // Event deleted successfully
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Event has been deleted.',
                            icon: 'success'
                        }).then(() => {
                            // Optionally, you can reload the page or perform other actions
                            location.reload();
                        });
                    } else {
                        // Error in deleting the event
                        Swal.fire('Error!', response.msg, 'error');
                    }
                },
                error: function(xhr, status) {
                    console.log('AJAX error: ' + xhr.statusText);
                }
            });
        }
    });
}
</script>





  
    <script src="record_print.js"></script>

<!-- Footer -->
<?php include "include/footer.php"; ?>
<!-- End of Footer -->