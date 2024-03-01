<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Farmers";

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
            <h1 class="h3 mb-0 text-gray-800">Ranks</h1>
            
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Ranks</h6>

                        <a href="add_rank.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Rank</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                       
                                        <th scope="col">Rank Name</th>
                                        <th scope="col">Description</th>            
                                       
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        
                                        <th scope="col">Rank Name</th>
                                        <th scope="col">Description</th>            
                                       
                                    
                                    </tr>
                                </tfoot>
                                <tbody>

                                   <?php
$display_ranks = "SELECT * FROM ranks";
$sqlQuery = mysqli_query($con, $display_ranks) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($sqlQuery)) {
    $rank_id = $row['rank_id'];
    $rank_name = $row['rank_name'];
    $rank_description = $row['rank_description'];
                                        

                                    ?>
                                        <tr>
                                          
                                           <td class="full_name">
                                                <span><a class="text-info" href="add_rank.php?rank_id=<?php echo $rank_id; ?>"><?php echo $rank_name ?></a></span>
                                                <div>
                                                    <ul>
                                                        <li><a href="add_rank.php?rank_id=<?php echo $rank_id; ?>">Edit</a></li>
                                                        <li><a href="delete_rank.php?rank_id=<?php echo $rank_id; ?>">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?php echo $rank_description; ?></td>
                                           
                                          
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