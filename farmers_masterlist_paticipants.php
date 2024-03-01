<?php
require 'database_connection.php';

$title = "Botolan Municipal Agriculture Office - Event Masterlist Participants";

include "include/header.php";

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}

$brgy = isset($_GET['brgy']) ? $_GET['brgy'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$event = isset($_GET['event']) ? $_GET['event'] : '';
?>
<?php if (isset($_SESSION['success'])) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo $_SESSION['success']; ?>'
            });
        });
    </script>
<?php }
unset($_SESSION['success']) ?>
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
                    <h1 class="h3 mb-0 text-gray-800">Event Masterlist Participants</h1>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Full Calendar -->
                    <div class="col-xl-12 col-lg-8">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Farmers Participants</h6><button id="downloadexcel" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Export</button>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form id="farmer_brgy_filter" class="mb-3" action="farmers_masterlist_paticipants.php" method="GET">

                                        <div class="row col-md-12 col-sm-12">
                                           
                                            <div class="form-group col-md-3 col-sm-12">
                                                <label for="inputFilterEvent">Event</label>
                                                <select class="form-control" id="inputFilterEvent" name="event">
                                                    <option value="">All Events</option>
                                                    <?php
                                                    // Retrieve unique event names from the farmers_records table
                                                    $eventQuery = "SELECT DISTINCT event FROM farmers_records";
                                                    $eventResult = mysqli_query($con, $eventQuery) or die(mysqli_error($con));

                                                    while ($eventRow = mysqli_fetch_assoc($eventResult)) {
                                                        $eventName = $eventRow['event'];
                                                        $selected = ($eventName == $_GET['event']) ? 'selected' : '';
                                                        echo "<option value='$eventName' $selected>$eventName</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-12">
                                                <label for="inputFilterLocation">Location</label>
                                                <select class="form-control" id="inputFilterLocation" name="location">
                                                    <option value="">All Locations</option>
                                                    <?php
                                                    // Retrieve unique locations from the farmers_records table
                                                    $locationQuery = "SELECT DISTINCT location FROM farmers_records";
                                                    $locationResult = mysqli_query($con, $locationQuery) or die(mysqli_error($con));

                                                    while ($locationRow = mysqli_fetch_assoc($locationResult)) {
                                                        $locationName = $locationRow['location'];
                                                        $selected = ($locationName == $_GET['location']) ? 'selected' : '';
                                                        echo "<option value='$locationName' $selected>$locationName</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-12">
                                                <label for="inputFilterLocation">Barangay </label>
                                                <select class="form-control" id="inputFilterLocation" name="brgy">
                                                    <option value="">All Barangay</option>
                                                    <option value="Bancal"<?= $brgy == 'Bancal' ? ' selected="selected"' : ''; ?>>Bancal</option>
                                                     <option value="Bangan"<?= $brgy == 'Bangan' ? ' selected="selected"' : ''; ?>>Bangan</option>
                                                <option value="Batonlapoc"<?=$brgy == 'Batonlapoc' ? ' selected="selected"' : '';?>>Batonlapoc</option>
                                                        <option value="Belbel"<?=$brgy == 'Belbel' ? ' selected="selected"' : '';?>>Belbel</option>
                                                        <option value="Beneg"<?=$brgy == 'Beneg' ? ' selected="selected"' : '';?>>Beneg</option>
                                                        <option value="Binuclutan"<?=$brgy == 'Binuclutan' ? ' selected="selected"' : '';?>>Binuclutan</option>
                                                        <option value="Burgos"<?=$brgy == 'Burgos' ? ' selected="selected"' : '';?>>Burgos</option>
                                                        <option value="Cabatuan"<?=$brgy == 'Cabatuan' ? ' selected="selected"' : '';?>>Cabatuan</option>
                                                        <option value="Capayawan"<?=$brgy == 'Capayawan' ? ' selected="selected"' : '';?>>Capayawan</option>
                                                        <option value="Carael"<?=$brgy == 'Carael' ? ' selected="selected"' : '';?>>Carael</option>
                                                        <option value="Danacbunga"<?=$brgy == 'Danacbunga' ? ' selected="selected"' : '';?>>Danacbunga</option>
                                                        <option value="Maguisguis"<?=$brgy == 'Maguisguis' ? ' selected="selected"' : '';?>>Maguisguis</option>
                                                        <option value="Malomboy"<?=$brgy == 'Malomboy' ? ' selected="selected"' : '';?>>Malomboy</option>
                                                        <option value="Mambog"<?=$brgy == 'Mambog' ? ' selected="selected"' : '';?>>Mambog</option>
                                                        <option value="Moraza"<?=$brgy == 'Moraza' ? ' selected="selected"' : '';?>>Moraza</option>
                                                        <option value="Nacolcol"<?=$brgy == 'Nacolcol' ? ' selected="selected"' : '';?>>Nacolcol</option>
                                                        <option value="Owaog-Nibloc"<?=$brgy == 'Owaog-Nibloc' ? ' selected="selected"' : '';?>>Owaog-Nibloc</option>
                                                        <option value="Paco (poblacion)"<?=$brgy == 'Paco (poblacion)' ? ' selected="selected"' : '';?>>Paco (poblacion)</option>
                                                        <option value="Palis"<?=$brgy == 'Palis' ? ' selected="selected"' : '';?>>Palis</option>
                                                        <option value="Panan"<?=$brgy == 'Panan' ? ' selected="selected"' : '';?>>Panan</option>
                                                        <option value="Parel"<?=$brgy == 'Parel' ? ' selected="selected"' : '';?>>Parel</option>
                                                        <option value="Paudpod"<?=$brgy == 'Paudpod' ? ' selected="selected"' : '';?>>Paudpod</option>
                                                        <option value="Poonbato"<?=$brgy == 'Poonbato' ? ' selected="selected"' : '';?>>Poonbato</option>
                                                        <option value="Porac"<?=$brgy == 'Porac' ? ' selected="selected"' : '';?>>Porac</option>
                                                        <option value="San Isidro"<?=$brgy == 'San Isidro' ? ' selected="selected"' : '';?>>San Isidro</option>
                                                        <option value="San Juan"<?=$brgy == 'San Juan' ? ' selected="selected"' : '';?>>San Juan</option>
                                                        <option value="San Miguel"<?=$brgy == 'San Miguel' ? ' selected="selected"' : '';?>>San Miguel</option>
                                                        <option value="Santiago"<?=$brgy == 'Santiago' ? ' selected="selected"' : '';?>>Santiago</option>
                                                        <option value="Tampo (poblacion)"<?=$brgy == 'Tampo (poblacion)' ? ' selected="selected"' : '';?>>Tampo (poblacion)</option>
                                                        <option value="Taugtog"<?=$brgy == 'Taugtog' ? ' selected="selected"' : '';?>>Taugtog</option>
                                                        <option value="Villar"<?=$brgy == 'Villar' ? ' selected="selected"' : '';?>>Villar</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-12">
                                                <label for="inputFilterStatus">Status</label>
                                                <select class="form-control" id="inputFilterStatus" name="status">
                                                    <option value="">All Status</option>
                                                    <option value="RECEIVED"<?= $status == 'RECEIVED' ? ' selected="selected"' : ''; ?>>Received</option>
                                                    <option value="NOT RECEIVED"<?= $status == 'NOT RECEIVED' ? ' selected="selected"' : ''; ?>>Not Received</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-12 mt-4">
                                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                                <button type="button" class="btn btn-danger" onclick="resetFilters()">Reset Filters</button>
                                            </div>
                                        </div>

                                    </form>
                                    <table class="table table-bordered" id="farmers_records" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Events</th>
                                                <th scope="col">Date Conducted</th>
                                                <th scope="col">Date Accomplished</th>
                                                <th scope="col">Event Location</th>
                                                <th scope="col">Farmer's Participants</th>
                                                <th scope="col">Barangay</th>
                                                <th scope="col">Received</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                         <?php
$display_farmers = "SELECT fr.*, f.first_name, f.middle_name, f.last_name, f.extension_name, f.brgy
                    FROM farmers_records fr
                    INNER JOIN farmers f ON fr.farmer_id = f.farmer_id
                    WHERE 1";

if (!empty($brgy)) {
    $display_farmers .= " AND f.brgy = '$brgy'";
}

if (!empty($event)) {
    $display_farmers .= " AND fr.event = '$event'";
}

if (!empty($status)) {
    $display_farmers .= " AND fr.status = '$status'";
}

if (!empty($_GET['start_date'])) {
    $start_date = $_GET['start_date'];
    $display_farmers .= " AND fr.formatted_date >= '$start_date'";
}

if (!empty($_GET['end_date'])) {
    $end_date = $_GET['end_date'];
    $display_farmers .= " AND fr.formatted_date <= '$end_date'";
}

if (!empty($_GET['location'])) {
    $location = $_GET['location'];
    $display_farmers .= " AND fr.location = '$location'";
}

$sqlQuery = mysqli_query($con, $display_farmers) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($sqlQuery)) {
    $id = $row['id'];
    $full_name = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . ' ' . $row['extension_name'];
    $event = $row['event'];
    $contact = $row['contact'];
    $formatted_date = $row['formatted_date'];
    $formatted_date2 = $row['formatted_date2'];
    $formatted_time = $row['formatted_time'];
    $formatted_time2 = $row['formatted_time2'];
    $location = $row['location'];
    $brgy = $row['brgy'];
    $land_size = $row['land_size'];
    $status = $row['status'];

    $tdStatusStyle = ($status == 'RECEIVED') ? 'background-color: green; color: white;' : 'background-color: red; color: white;';
?>


    <tr>
        <td><?php echo $event; ?></td>
        <td><?php echo $formatted_date; ?></td>
        <td><?php echo $formatted_date2; ?></td>
        <td><?php echo $location; ?></td>
        <td><?php echo $full_name; ?></td>
        <td><?php echo $brgy; ?></td>
        <td><?php echo $land_size; ?></td>
        <td style="<?php echo $tdStatusStyle; ?>"><?php echo $status; ?></td>
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

        <!-- BARANGAY FILTER -->

        <script>
            document.getElementById('downloadexcel').addEventListener('click', function () {
                var table = document.getElementById("farmers_records");

                var rows = table.rows;

                var table2excel = new Table2Excel();
                table2excel.export(table);
            });

            function resetFilters() {
                document.getElementById("farmer_brgy_filter").reset();
                document.getElementById("farmer_brgy_filter").submit();
            }
        </script>
