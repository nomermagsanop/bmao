<!-- Sidebar -->
<div class="sidebar_main">
<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
		<div class="sidebar-brand-icon">
			<img src="img/da_logo.png" alt="Botolan Municipal Agriculture Office">
		</div>
		<div class="sidebar-brand-text mx-3 mt-2">Botolan Municipal Agriculture Office</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<li class="nav-item">
		<a class="nav-link" href="dashboard.php">
			<i class="fa-solid fa-border-all"></i>
			<!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
			<span>Dashboard</span></a>
	</li>	

<?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
			aria-controls="collapse1">
			<!-- <i class="fas fa-fw fa-leaf"></i> -->
			 <i class="fa-regular fa-paper-plane"></i>
			<span>Schedule</span>
		</a>
		<div id="collapse1" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Send Schedule</h6>
				
				<a class="collapse-item" href="barangay_events.php">Send Brgy. Participants</a>
				
				<a class="collapse-item" href="events.php">Send Farmer Participants</a>
			
			</div>
		</div>
	</li>
	<?php } ?>

 

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
			aria-controls="collapse2">
			<!-- <i class="fas fa-fw fa-leaf"></i> -->
			<i class="fas fa-calendar-check"></i>
			<span>Upcoming Events</span>
		</a>
		<div id="collapse2" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Upcoming Events</h6>			
				<a class="collapse-item" href="upcoming_events.php">Brgy. Participants</a>
				 <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
				<a class="collapse-item" href="farmers_records.php">Participants</a>
					<?php } ?>
				 <?php if ($_SESSION['role'] == "BARANGAY STAFF") { ?>
				<a class="collapse-item" href="barangay_records.php">Farmers Participants</a>
				<?php } ?>		
			</div>
		</div>
	</li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
            aria-controls="collapse4">
            <i class="fa-solid fa-hat-cowboy-side"></i>
            <span>Farmers</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingOne"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Farmers</h6>
                <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
                <a class="collapse-item" href="add_farmer.php">Add New Farmer</a>
                <?php } ?>
                <a class="collapse-item" href="farmers.php">View Farmers</a>
            </div>
        </div>
    </li>



	<li class="nav-item">
		<a class="nav-link" href="guidelines.php">
			<i class="fas fa-fw fa-ruler"></i>
			<span>Guidelines</span></a>
	</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true"
			aria-controls="collapse5">
			<!-- <i class="fas fa-fw fa-leaf"></i> -->
			 <i class="fa-solid fa-list"></i>
			<span>Programs</span>
		</a>
		<div id="collapse5" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Programs</h6>
				<?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
				<a class="collapse-item" href="add_program.php">Add Programs</a>
				<?php } ?>
				<a class="collapse-item" href="programs.php">Programs</a>
			</div>
		</div>
	</li>

	<?php if ($_SESSION['role'] == "ADMINISTRATOR") { ?>	
<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true"
		aria-controls="collapse7">
	<!-- 	<i class="fas fa-fw fa-user"></i> -->
	 <i class="fa-regular fa-user"></i>
		<span>Users</span>
	</a>
	<div id="collapse7" class="collapse" aria-labelledby="headingTwo"
		data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<h6 class="collapse-header">Users</h6>
			<a class="collapse-item" href="add_staff.php">Add New User</a>
			<a class="collapse-item" href="staffs.php">View Users</a>
		</div>
	</div>
</li>
<?php } ?>

 <?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true"
			aria-controls="collapse6">
			<!-- <i class="fas fa-fw fa-leaf"></i> -->
			<i class="fa-solid fa-users"></i>
			<span>Personnels</span>
		</a>
		<div id="collapse6" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Personnels</h6>
				
				<a class="collapse-item" href="personnels.php">Personnels</a>
				<a class="collapse-item" href="ranks.php">Ranks</a>
				
			</div>
		</div>
	</li>

        <hr class="my-3">
        <h6 class="navbar-heading text-muted" style="margin-left: 20px;">Reporting</h6>
        <ul class="navbar-nav mb-md-3">
        <hr class="sidebar-divider" style="background-color: grey;">
   <li class="nav-item">
		<a class="nav-link" href="logs.php">
			<i class="fa-solid fa-clipboard"></i>
			<span>Logs</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
			aria-controls="collapse3">
			<!-- <i class="fas fa-fw fa-leaf"></i> -->
			<i class="fa-regular fa-folder-open"></i>
			<span>Records</span>
		</a>
		<div id="collapse3" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Records</h6>
				
				<a class="collapse-item" href="records.php">Brgy. Records</a>
				<a class="collapse-item" href="farmers_masterlist_paticipants.php">Farmers Records</a>
				
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse8" aria-expanded="true"
			aria-controls="collapse8">
		<!-- 	<i class="fas fa-fw fa-user"></i> -->
		<i class="fa-solid fa-trash"></i>
			<span>Archive</span>
		</a>
		<div id="collapse8" class="collapse" aria-labelledby="headingTwo"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Archive</h6>
				<a class="collapse-item" href="restore_farmers.php">Farmers</a>
				<a class="collapse-item" href="restore_programs.php">Programs</a>
			</div>
		</div>
	</li>
	<?php } ?>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
</div>
<!-- End of Sidebar -->