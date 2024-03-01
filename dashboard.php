<?php 
$title = "Botolan Municipal Agriculture Office - Dashboard";
require 'database_connection.php';
include "include/header.php";
include "dashboard_counts.php";

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-9 col-lg-9">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
                                    <div id="fcalendar">
                                    </div>
                                    <?php } ?>
                                        

                                    <?php if ($_SESSION['role'] == "BARANGAY STAFF") { ?>
                                      <?php
    $currentDate = date("Y-m-d"); // Get the current date
    $sqlQuery = mysqli_query($con, "SELECT * FROM calendar_event_master WHERE status='PENDING' AND event_start_date >= '$currentDate'");
    while ($row = mysqli_fetch_array($sqlQuery)) {

        $program_id = $row['program_id'];
        $program = ''; // Initialize the $program variable
        $image = ''; // Initialize the $image variable

        // Fetch program name and image from the programs table
        $get_program = "SELECT * FROM programs WHERE program_id = '$program_id'";
        $run_data = mysqli_query($con, $get_program);

        if ($run_data && mysqli_num_rows($run_data) > 0) {
            $row1 = mysqli_fetch_assoc($run_data);
            $program = $row1['prog_name'];
            $image = $row1['upload_url']; // Assuming the column name is upload_url
        }

        $event_id = $row['event_id'];
        $event_start_date = date('F j, Y', strtotime($row['event_start_date']));
        $event_start_time = date('g:i A', strtotime($row['event_start_time']));
        $event_end_date = date('F j, Y', strtotime($row['event_end_date']));
        $event_end_time = date('g:i A', strtotime($row['event_end_time']));

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
                                                <div class="card-body">
                                               <img src="img/programs/<?php echo $image; ?>" alt="Event Image" class="img-fluid rounded float-right mr-3" style="width: 200px; height: 220px;">

                                                <h5 class="card-title">Event Title:<strong> <?php echo $program; ?></strong> </h5>
                                                <p class="card-text">This is a sample description for the event.</p>
                                                <div class="card-date">
                                                    <p class="mb-1"><strong>Start Date:</strong> <?php echo $event_start_date; ?></p>
                                                    <p><strong>End Date:</strong><?php echo $event_end_date; ?></p>
                                                </div>
                                               <strong>Barangay Participant's:</strong><h6> <?php foreach ($event_location as $value) {echo $value . ", ";}?> </h6>


                                                    
                                            </div>
                                        <?php } ?>
                                     <?php } ?>

                                </div>
                            </div>
                        </div>
						
                        <div class="col-xl-3 col-md-3 mb-4">
							<!-- Total Farmers Card Example -->
                            <div class="card border-left-success shadow mb-4 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Active Farmers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 total_activefarmers"><?php echo (isset($active_count['activecount'])) ? $active_count['activecount'] : '0'; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hat-cowboy-side fa-2x text-gray-360"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<!-- Total Events Card Example -->
                            <div class="card border-left-warning shadow mb-4 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                    Upcoming Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 total_events"><?php echo (isset($event_count['eventcount'])) ? $event_count['eventcount'] : '0'; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-360"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
							<!-- Number of Staffs Card Example -->
                            <div class="card border-left-primary shadow mb-4 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 number_staffs"><?php echo (isset($staff_count['staffcount'])) ? $staff_count['staffcount'] : '0'; ?></div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fa-solid fa-user-tag  fa-2x text-gray-360"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php } ?>

							<!-- Pending Farmers Card Example -->
                            <div class="card border-left-danger shadow mb-4 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                                Inactive Farmers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 inactive_farmers"><?php echo (isset($inactive_count['inactivecount'])) ? $inactive_count['inactivecount'] : '0'; ?></div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fa-solid fa-user-xmark fa-2x text-gray-360"></i>
                                        </div>
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