    <?php
    require 'database_connection.php';
    $title = "Botolan Municipal Agriculture Office - Guidelines";
    include "include/header.php";

    $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}

    $brgy = isset($_GET['brgy']) ? $_GET['brgy'] : '';
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
                        <h1 class="h3 mb-0 text-gray-800">Notified Farmers</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Full Calendar -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Farmers Participants</h6> <h6 class="m-0 font-weight-bold text-primary float-right text-danger">Mark check if not Received!</h6>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                          <form id="farmer_brgy_filter" class="mb-3" action="farmers_records.php" method="GET">
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
                                   
                                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th scope="col">Events</th>
                                                <th scope="col">Date Conducted</th>
                                                <th scope="col">Farmer's Participants</th>
                                                <th scope="col">Barangay</th>
                                                <th scope="col">Event Location</th>
                                                <th scope="col">(🗸) Not Reiceved</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <?php
$status = "NOTIFIED"; // Filter by ACTIVE status
if ($brgy == "") {
    $display_farmers = "SELECT fr.*, f.first_name, f.middle_name, f.last_name, f.extension_name, f.brgy
                        FROM farmers_records fr
                        JOIN farmers f ON fr.farmer_id = f.farmer_id
                        WHERE fr.status = '$status'";
} else {
    $display_farmers = "SELECT fr.*, f.first_name, f.middle_name, f.last_name, f.extension_name, f.brgy
                        FROM farmers_records fr
                        JOIN farmers f ON fr.farmer_id = f.farmer_id
                        WHERE fr.brgy LIKE '$brgy' AND fr.status = '$status'";
}

$sqlQuery = mysqli_query($con, $display_farmers) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($sqlQuery)) {
    $id = $row['id'];
   
    $event = $row['event'];
    $contact = $row['contact'];
    $formatted_date = $row['formatted_date'];
    $formatted_date2 = $row['formatted_date2'];
    $formatted_time = $row['formatted_time'];
    $formatted_time2 = $row['formatted_time2'];
    $location = $row['location'];
    $brgy = $row['brgy'];
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $last_name = $row['last_name'];
    $extension_name = $row['extension_name'];

    // Update the status to RECEIVED if it's currently NOTIFIED
    if ($row['status'] === 'NOTIFIED') {
        $updateStatusQuery = "UPDATE farmers_records SET status = 'RECEIVED' WHERE id = $id";
        mysqli_query($con, $updateStatusQuery);
    }
    ?>
    <tr>
        <td><?php echo $event; ?></td>
        <td><?php echo $formatted_date; ?></td>
        <td><?php echo "$first_name $middle_name $last_name $extension_name"; ?></td>
        <td><?php echo $brgy; ?></td>
        <td><?php echo $location; ?></td>
        <td>
            <div class="form-check" style="text-align: center;">
                <input class="form-check-input" type="checkbox" id="checkbox_<?php echo $id; ?>" name="checkbox[]" value="<?php echo $id; ?>">
            </div>
        </td>
    </tr>
<?php } ?>

    </tbody>
    </table>

   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h4 class="m-0 font-weight-bold text-primary"></h4>
    <button class="btn btn-success float-right" type="button" id="saveButton">Save</button>
</div>


</form>

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

    <!--        BARANGAY FILTER -->
      
<script>
    // JavaScript function to submit the form when the barangay selection changes
    function filterByBarangay() {
        var selectedBrgy = document.getElementById('inputFilterBrgy').value;
        document.getElementById('farmer_brgy_filter').submit();
    }
</script>

    <!-- CHANGE THE STATUS -->

<script>
  $(document).ready(function () {
    $("#saveButton").click(function () {
        // Collect checked checkboxes
        var checkedIds = $("input:checkbox:checked").map(function () {
            return this.value;
        }).get();

        // Display a confirmation dialog using SweetAlert2
        Swal.fire({
            title: 'Confirm Status Update',
            text: 'Are you sure you want to exclude all the checked value from the event?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked 'Yes', update the status
                if (checkedIds.length > 0) {
                    updateStatus(checkedIds, 'NOT RECEIVED');
                } else {
                    updateStatus([], 'RECEIVED');
                }
            }
        });
    });

    function updateStatus(ids, status) {
        // Send AJAX request to update status on the server
        $.ajax({
            type: 'POST',
            url: 'update_status.php', // Replace with your server-side script
            data: {ids: ids, status: status},
            success: function (response) {
                // Handle success, e.g., show a success message
                Swal.fire({
                    icon: 'success',
                    title: 'Status Updated',
                    text: 'Status has been updated successfully.',
                });

                // Reload the table or update the UI as needed
                // You may need to modify this part based on your implementation
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error, e.g., show an error message
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating the status.',
                });
            }
        });
    }
});

</script>
