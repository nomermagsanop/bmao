<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Farmers";

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
            <h1 class="h3 mb-0 text-gray-800">Programs</h1>
            
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Event And Participants</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Event Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Barangay</th>            
                                        <th scope="col">Participants</th>
                                        <th scope="col">Event Start</th>
                                        <th scope="col">Event End</th>
                                    </tr>
                                </thead>
                                <!--  -->
                                <tbody>

                                    <?php
                                                                     
                                    // Check if the user has the role "BARANGAY STAFF"
                                    if ($_SESSION['role'] == 'BARANGAY STAFF') {
                                        // Retrieve the barangay information for the logged-in user
                                        $userBrgy = $_SESSION['brgy'];

                                        // Modify the query to filter by the user's barangay
                                        $display_barangay_records = "SELECT * FROM barangay_records WHERE delete_flag = 0 AND brgy = '$userBrgy'";
                                    } else {
                                        // The user doesn't have the role "BARANGAY STAFF," display all farmers
                                        $display_barangay_records = "SELECT * FROM barangay_records WHERE delete_flag = 0";

                                        // Modify the query to filter by barangay if it's selected
                                        if (!empty($brgy)) {
                                            $display_barangay_records .= " AND brgy = '$brgy'";
                                        }
                                    }

                                    $sqlQuery = mysqli_query($con, $display_barangay_records) or die(mysqli_error($con));
               
                                    while($row = mysqli_fetch_array($sqlQuery)){
                                        $id = $row['id'];
                                        $event = $row['event'];
                                        $location = $row['location'];
                                        $full_name = $row['full_name'];
                                        $brgy = $row['brgy'];
                                        $formatted_date = $row['formatted_date'];
                                        $formatted_date2 = $row['formatted_date2'];
                                        $active_farmers_list = $row['active_farmers_list'];                             

                                    ?>
                                       <tr>
    <td><?php echo $event; ?></td>
    <td><?php echo $location; ?></td>
    <td><?php echo $brgy; ?></td>
    <td>
        <ul> <!-- Assuming you want to display the list in an unordered list -->
            <?php
            // Explode the string into an array using newline as the delimiter
            $farmersArray = explode("\n", $active_farmers_list);

            // Iterate through the array and display each farmer's name
            foreach ($farmersArray as $farmer) {
                echo "<li>$farmer</li>";
            }
            ?>
        </ul>
    </td>
    <td><?php echo $formatted_date; ?></td>
    <td><?php echo $formatted_date2; ?></td>
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