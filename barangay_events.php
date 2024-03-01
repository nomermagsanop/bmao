<?php 
$title = "Botolan Municipal Agriculture Office - Events";
include "include/header.php";
require 'database_connection.php';


$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}


if (isset($_GET['brgy'])) {
    $brgy = $_GET['brgy'];
} else {
    $brgy = "";
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
                        <h1 class="h3 mb-0 text-gray-800">Events</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-primary">Barangay Send SMS</h4>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                       <form id="brgy_filter" class="mb-3" action="barangay_events.php" method="GET">
                                            <div class="row col-md-12 col-sm-12">
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label for="inputFilterBrgy">Barangay</label>
                                                  <select class="form-control text-uppercase" id="inputFilterBrgy" name="brgy" onchange="filterByBarangay()">
                                                        <option value="">All Barangay</option>
                                                        <option value="Bancal"<?=$brgy == 'Bancal' ? ' selected="selected"' : '';?>>Bancal</option>
                                                        <option value="Bangan"<?=$brgy == 'Bangan' ? ' selected="selected"' : '';?>>Bangan</option>
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
                                                <label for="inputRank_id">Events</label>
                                                    <select class="form-control text-" id="inputEvent" name="inputEvent" required>
                                                      <option value="" disabled selected>Choose Events</option>
                                                     <?php
                                                    $today = date("Y-m-d"); // Get the current date

                                                    $display_query = "SELECT cem.event_id, cem.program_id, cem.event_start_date, cem.event_start_time, cem.event_end_date, cem.event_end_time, cem.event_location, cem.event_description, cem.status, p.prog_name, p.upload_url 
                                                                      FROM calendar_event_master AS cem 
                                                                      INNER JOIN programs AS p ON cem.program_id = p.program_id
                                                                      WHERE cem.status = 'PENDING' AND cem.event_start_date >= '$today'";

                                                    $sqlQuery = mysqli_query($con, $display_query) or die(mysqli_error($con));

                                                    while ($row = mysqli_fetch_array($sqlQuery)) {
                                                        $event_id = $row['event_id'];
                                                        $prog_name = $row['prog_name']; // Replaced 'event_name' with 'prog_name'
                                                        $event_description = $row['event_description'];
                                                        $event_location = unserialize($row['event_location']);

                                                        $event_start_date = date('F j, Y', strtotime($row['event_start_date']));
                                                        $event_start_time = date('g:i A', strtotime($row['event_start_time']));
                                                        $event_end_date = date('F j, Y', strtotime($row['event_end_date']));
                                                        $event_end_time = date('g:i A', strtotime($row['event_end_time']));
                                                           ?>
                                                        <option value="<?= $prog_name; ?>"
                                                        data-formatted-date="<?= $event_start_date; ?>"
                                                        data-formatted-time="<?= $event_start_time; ?>"
                                                        data-formatted-date2="<?= $event_end_date; ?>"
                                                        data-formatted-time2="<?= $event_end_time; ?>">
                                                            <?= $prog_name; ?>
                                                        </option>
                                                          <?php } ?>
                                                  </select>
                                                <div class="invalid-feedback">Please Select Events.</div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-12">
                                            <label for="inputEventLoc">Program Location</label>
                                            <select class="form-control" id="inputEventLoc" required>
                                            <option value="" disabled selected>Choose Location</option>
                                            <?php
                                            $sqlQuery = "SELECT DISTINCT prog_loc FROM programs";
                                            $result = mysqli_query($con, $sqlQuery) or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($result)) {
                                            $prog_loc = $row['prog_loc'];
                                            ?>
                                            <option value="<?=$prog_loc;?>"><?=$prog_loc;?></option>
                                            <?php } ?>
                                            </select>
                                             <div class="invalid-feedback">Please Select Event Location.</div>
                                             </div>     
            
                                               <div class="col-xl-12 col-lg-12">
                                                             <div class="row">
                                                                  <div class="col-sm-12">  
                                                                    <div class="form-group">        
                                                                    <label for="inputcustom_msg">Add custom message</label>
                                                                    <textarea class="form-control " id="inputcustom_msg" placeholder="Add Custom Message" rows="3" ></textarea>     
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        </form>
                                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Brgy Officials List</th>
                                                            <th scope="col">Barangay</th>
                                                            <th scope="col">Contact No.</th>
                                                        <th scope="col">
                                                            <input type="checkbox" class="largerCheckbox" id="chkAll" onclick="checkAllSMS()" /> Select All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                         <?php
                                        if ($brgy == "") {
                                            $display_staffs = "SELECT * FROM staffs WHERE role = 'BARANGAY STAFF'";
                                        } else {
                                            $display_staffs = "SELECT * FROM staffs WHERE brgy LIKE '$brgy' AND role = 'BARANGAY STAFF'";
                                        }
                                        $sqlQuery = mysqli_query($con, $display_staffs) or die(mysqli_error($con));

                                        while ($row = mysqli_fetch_array($sqlQuery)) {
                                            $staff_id = $row['staff_id'];
                                            $first_name = $row['first_name'];
                                            $middle_name = $row['middle_name'];
                                            $last_name = $row['last_name'];
                                            $extension_name = $row['extension_name'];
                                            $contact = $row['contact'];
                                            $brgy = $row['brgy'];
                                        ?>


                                            <tr>
                                                <td>
                                                    <span><?php echo $last_name . " " . $first_name . " " . $middle_name . " " . $extension_name; ?></span>
                                                </td>
                                                <td><?php echo strtoupper($brgy); ?></td>
                                                <td><?php echo $contact; ?></td>
                                                <td>
                                                    <div class='form-check'>
                                                        <form action="send_sms.php" id="smsForm">

                                                            <input class="form-check-input sms-checkbox" type="checkbox"  value="<?php echo $contact; ?>" name="inputSMS[]" data-id="<?php echo $farmer_id; ?>"
                                                                data-formatted-date="<?= $formattedDate; ?>"
                                                                data-formatted-time="<?= $formattedTime; ?>"
                                                                data-formatted-date2="<?= $formattedDate2; ?>"
                                                                data-formatted-time2="<?= $formattedTime2; ?>"
                                                                data-full-name="<?php echo $last_name . ' ' . $first_name . ' ' . $middle_name . ' ' . $extension_name; ?>"
                                                                data-brgy="<?php echo strtoupper($brgy); ?>">
                                                            <label class="form-check-label">
                                                                SMS
                                                            </label>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-primary"></h4><button class="btn btn-success float-right" type="button" id="brgy_externalSendButton" >Brgy Send Message</button>                             
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
            <script src="barangay_send.js"></script>
            <script>
                function checkAllSMS() {
                    var checkboxes = document.querySelectorAll('.sms-checkbox');
                    var chkAll = document.getElementById('chkAll');

                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = chkAll.checked;
                    }
                }
            </script>
            <script>
                // JavaScript function to submit the form when the barangay selection changes
                function filterByBarangay() {
                    var selectedBrgy = document.getElementById('inputFilterBrgy').value;
                    document.getElementById('brgy_filter').submit();
                }
            </script>
            <!-- Footer -->
            <?php include "include/footer.php"; ?>
            <!-- End of Footer -->

