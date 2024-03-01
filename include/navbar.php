
<!-- Topbar -->

<div class="topbar">
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small">
					
	<?php if (isset($_SESSION["first_name"]) && isset($_SESSION["last_name"])) {
    $fullName = $_SESSION["first_name"] . " " . $_SESSION["last_name"];

    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $fullName . '</span>';

    // Display the user's image
    if (isset($_SESSION["upload_url"])) {
        echo '<img class="img-profile rounded-circle" src="img/staffs/' . $_SESSION["upload_url"] . '">';
    } else {
        // If no image is found, display a default image
        echo '<img class="img-profile rounded-circle" src="img/undraw_profile_2.svg">';
    }
} else {
    // If the user is not logged in, display default values or handle accordingly
    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">STAFF NAME</span>';
    echo '<img class="img-profile rounded-circle" src="img/undraw_profile_2.svg">';
}
?>
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="userDropdown">
				<a class="dropdown-item" href="add_staff.php?staff_id=<?php if(isset($_SESSION["staff_id"])) {echo $_SESSION["staff_id"];}?>">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>
				<div class="dropdown-divider"></div>

				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>

</nav>
</div>
<!-- End of Topbar -->