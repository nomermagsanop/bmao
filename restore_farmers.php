<?php
require 'database_connection.php';

$title = "Botolan Municipal Agriculture Office - Farmers";

include "include/header.php";


$brgy = isset($_GET['brgy']) ? $_GET['brgy'] : '';

if (isset($_SESSION['success'])) {
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?php echo $_SESSION['success']; ?>'
    });
});
</script>
<?php } unset($_SESSION['success']) ?>
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
            <h1 class="h3 mb-0 text-gray-800">Marked Deleted Farmers</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Farmers</h6>                    
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group col-md-3 col-sm-12">
                                <label for="inputFilterBrgy">Barangay</label>
                                <select class="form-control text-uppercase" id="inputFilterBrgy" name="inputFilterBrgy" onchange="filterByBrgy()">
                                    <option value="">All Barangay</option>
                                    <?php
                                    $barangays = ["Bancal", "Bangan", "Batonlapoc", "Belbel", "Beneg", "Binuclutan", "Burgos", "Cabatuan", "Capayawan", "Carael", "Danacbunga", "Maguisguis", "Malomboy", "Mambog", "Moraza", "Nacolcol", "Owaog-Nibloc", "Paco (poblacion)", "Palis", "Panan", "Parel", "Paudpod", "Poonbato", "Porac", "San Isidro", "San Juan", "San Miguel", "Santiago", "Tampo (poblacion)", "Taugtog", "Villar"];
                                    foreach ($barangays as $barangay) {
                                        echo '<option value="' . $barangay . '"' . ($brgy == $barangay ? ' selected="selected"' : '') . '>' . $barangay . '</option>';
                                    }?>
                                </select>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">RSBSA No.</th>
                                        <th scope="col">Contact No.</th>
                                         <th scope="col">Address</th>
                                        <th scope="col">Land Size</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    $display_farmers = "SELECT * FROM farmers WHERE delete_flag = 1";

                                    // Modify the query to filter by barangay if it's selected
                                    if (!empty($brgy)) {
                                    $display_farmers .= " AND brgy = '$brgy'";
                                    }

                                    $sqlQuery = mysqli_query($con, $display_farmers) or die(mysqli_error($con));

                                    while ($row = mysqli_fetch_array($sqlQuery)) {
                                    $farmer_id = $row['farmer_id'];
                                    $first_name = $row['first_name'];
                                    $middle_name = $row['middle_name'];
                                    $last_name = $row['last_name'];
                                    $extension_name = $row['extension_name'];
                                    $sex = $row['sex'];
                                    $rnumber = $row['rnumber'];
                                    $controlno = $row['controlno'];
                                    $contact = $row['contact'];
                                    $land_size = $row['land_size'];

                                    $status = $row['status'];
                                    $brgy = $row['brgy'];

                                    $image = $row['upload_url'];
                                    // Rest of your code to display farmer details
                                    ?>
                                       <tr>
                                            <td><?php
                                                if ($image != "") { ?>
                                                    <img class="mx-auto d-block rounded" src="img/farmers/<?php echo $image; ?>" width="50">
                                                <?php } else {
                                                    if ($sex == "MALE") {
                                                ?>
                                                        <img class="mx-auto d-block rounded" src="img/undraw_profile_2.svg" width="50">
                                                    <?php } else if ($sex == "FEMALE") { ?>
                                                        <img class="mx-auto d-block rounded" src="img/undraw_profile_1.svg" width="50">
                                                    <?php }
                                                } ?>
                                            </td>
                                            <td class="full_name">
                                             <span><a class="text-info" href="add_farmer.php?farmer_id=<?php echo $farmer_id; ?>"><?php echo $last_name . " " .  $first_name . " " . $middle_name . " " . $extension_name?></a></span>                                         
                                            </td>
                                            <td><?php echo $rnumber; ?></td>
                                            <td><?php echo $contact; ?></td>
                                            <td><?php echo $brgy; ?></td>
                                            <td><?php echo $land_size; ?></td>
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
<script>
    function filterByBrgy() {
        var selectedBrgy = document.getElementById("inputFilterBrgy").value;
        var currentUrl = window.location.href;
        var newUrl = currentUrl.split('?')[0] + '?brgy=' + selectedBrgy;

        // Update the page URL without refreshing
        window.history.pushState({
            path: newUrl
        }, '', newUrl);

        // Reload the page with the new URL
        window.location.reload();
    }
</script>
