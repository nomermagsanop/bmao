<?php 
require 'database_connection.php'; 

$title = "Botolan Municipal Agriculture Office - Farmers";

include "include/header.php";

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


<?php if(isset($_SESSION['error'])){ ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '<?php echo $_SESSION['error'];?>'
    });
});
</script>
<?php }unset($_SESSION['error']) ?>
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
            <h1 class="h3 mb-0 text-gray-800">Marked Deleted Programs</h1>
            
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Full Calendar -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of Programs</h6>
                        <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
                        <a href="add_program.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Program</a>
                        <?php } ?>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Progarm Name</th>
                                          <?php if ($_SESSION['role'] !== 'BARANGAY STAFF') : ?>
                                        <th scope="col">Progarm Location</th>
                                        <?php endif; ?>
                                        <th scope="col">Description</th>            
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <!--  -->
                                <tbody>

                                    <?php
                                   $display_programs = "SELECT * FROM programs WHERE delete_flag = 1";
                                   $sqlQuery = mysqli_query($con, $display_programs) or die(mysqli_error($con));
                                    
                                    while($row = mysqli_fetch_array($sqlQuery)){
                                        $program_id = $row['program_id'];
                                        $prog_name = $row['prog_name'];
                                        $prog_descrip = $row['prog_descrip'];
                                        $status = $row['status'];
                                        $prog_loc = $row['prog_loc'];
                                         $image = $row['upload_url'];

                                    ?>
                                        <tr>
                                           <td>
                                                <?php if ($image != "") { ?>
                                                    <img class="mx-auto d-block rounded" src="img/programs/<?php echo $image; ?>" width="50">
                                                <?php } else { ?>
                                                    <img class="mx-auto d-block rounded" src="img/undraw_profile_2.svg" width="50">
                                                <?php } ?>
                                            </td>
                                 <td class="full_name">
    <span>
        <?php if ($_SESSION['role'] == "BARANGAY STAFF") : ?>
            <?php echo $prog_name; ?>
        <?php else : ?>
            <a class="text-info" href="add_program.php?program_id=<?php echo $program_id; ?>"><?php echo $prog_name; ?></a>
        <?php endif; ?>
    </span>

</td>

                                            
                                             <?php if ($_SESSION['role'] !== 'BARANGAY STAFF') : ?>
    <td><?php echo $prog_loc; ?></td>
<?php endif; ?>

                                            <td><?php echo $prog_descrip; ?></td>
                                            <td class="<?php echo ($status == 'ACTIVE') ? 'bg-success' : 'bg-danger'; ?> text-light text-center"><strong><?php echo $status; ?></strong></td>
                                          
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