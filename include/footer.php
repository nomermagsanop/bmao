



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Botolan Municipal Agriculture Office Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Add Event --><?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
	<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Add New Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate="">
						<div class="img-container">
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
								    <?php
								    // Include the SelectOption class file
								    require 'fetch_program.php';
								    // Create an instance of the SelectOption class
								    $selectOption = new Selectprogram();
								    // Get the class options
								    $programOptions = $selectOption->getProgramOptions();
								    ?>
								<select name="program_id" class="form-control" id="program_id" required>
								    <option value="" selected disabled>Select Events</option>
								    <?php echo $programOptions; ?>
								</select>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">  
									<div class="form-group">
									
									  <label for="event_start_date">Event start date:</label>
										<input type="date" name="event_start_date" id="event_start_date" class="form-control" required>
										<label for="event_start_time">Event start time:</label>
										<input type="time" name="event_start_time" id="event_start_time" class="form-control" required>
									 </div>
								</div>
								<div class="col-sm-6">  
									<div class="form-group">
									  <label for="event_end_date">Event End Date</label>				 
										<input type="date" name="event_end_date" id="event_end_date" class="form-control" required>
										<label for="event_end_time">Event start time:</label>
										<input type="time" name="event_end_time" id="event_end_time" class="form-control" required>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="event_location">Barangay Participating Event</label>
										<select name="event_location" id="event_location" class="form-select form-control" multiple data-live-search="true"  aria-describedby="brgyHelp" required>
											<option value="BANCAL">BANCAL</option>
											<option value="BANGAN">BANGAN</option>
											<option value="BATONLAPOC">BATONLAPOC</option>
											<option value="BELBEL">BELBEL</option>
											<option value="BENEG">BENEG</option>
											<option value="BINUCLUTAN">BINUCLUTAN</option>
											<option value="BURGOS">BURGOS</option>
											<option value="CABATUAN">CABATUAN</option>
											<option value="CAPAYAWAN">CAPAYAWAN</option>
											<option value="CARAEL">CARAEL</option>
											<option value="DANACBUNGA">DANACBUNGA</option>
											<option value="MAGUISGUIS">MAGUISGUIS</option>
											<option value="MALOMBOY">MALOMBOY</option>
											<option value="MAMBOG">MAMBOG</option>
											<option value="MORAZA">MORAZA</option>
											<option value="NACOLCOL">NACOLCOL</option>
											<option value="OWAOG-NIBLOC">OWAOG-NIBLOC</option>
											<option value="PACO (POBLACION)">PACO (POBLACION)</option>
											<option value="PALIS">PALIS</option>
											<option value="PANAN">PANAN</option>
											<option value="PAREL">PAREL</option>
											<option value="PAUDPOD">PAUDPOD</option>
											<option value="POONBATO">POONBATO</option>
											<option value="PORAC">PORAC</option>
											<option value="SAN ISIDRO">SAN ISIDRO</option>
											<option value="SAN JUAN">SAN JUAN</option>
											<option value="SAN MIGUEL">SAN MIGUEL</option>
											<option value="SANTIAGO">SANTIAGO</option>
											<option value="TAMPO (POBLACION)">TAMPO (POBLACION)</option>
											<option value="TAUGTOG">TAUGTOG</option>
											<option value="VILLAR">VILLAR</option>
										</select>
										<small id="brgyHelp" class="form-text text-muted">Hold <strong>CTRL</strong> to select multiple Location</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="event_description">Description</label>
										<textarea class="form-control" id="event_description" name="event_description" rows="3"></textarea>
									  </div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Add Event -->
	<?php } ?>
	<!-- Modal Edit Event -->


<div class="modal fade" id="event_edit_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Upcoming Event's</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate="">
						<div class="img-container">
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
									  <input type="hidden" id="edit_event_id" name="edit_event_id" value="">
									  <label for="edit_event_name">Event name</label>
									  <select name="edit_event_name" id="edit_event_name" class="form-control" required>
								    <?php
								    $conn = new mysqli("localhost", "root", "", "bmao");
								    if ($conn->connect_error) {
								        die("Connection failed: " . $conn->connect_error);
								    }
								      $sql = "SELECT program_id, prog_name FROM programs";
								    $result = $conn->query($sql);

								    // Check if there are rows in the result
								    if ($result->num_rows > 0) {
								        // Output data of each row
								        while($row = $result->fetch_assoc()) {
								            echo '<option value="' . $row["program_id"] . '">' . $row["prog_name"] . '</option>';
								        }
								    } else {
								        echo '<option value="" disabled>No programs available</option>';
								    }
								    $conn->close();
								?>
								</select>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">  
									<div class="form-group">
									  <label for="edit_event_start_date">Event Start Date</label>
									  <input type="date" name="edit_event_start_date" id="edit_event_start_date" class="form-control " placeholder="Event start date" required>
									  <label for="edit_event_start_time">Event start time:</label>
										<input type="time" name="edit_event_start_time" id="edit_event_start_time" class="form-control" required>
									 </div>
								</div>
								<div class="col-sm-6">  
									<div class="form-group">
									  <label for="edit_event_end_date">Event End Date</label>
									  <input type="date" name="edit_event_end_date" id="edit_event_end_date" class="form-control" placeholder="Event end date" required>
									  <label for="edit_event_end_time">Event End time:</label>
										<input type="time" name="edit_event_end_time" id="edit_event_end_time" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="edit_event_location">Event Participating Location</label>
										<select name="edit_event_location" id="edit_event_location" class="form-select form-control" multiple data-live-search="true"  aria-describedby="brgyHelp" required>
											<option value="BANCAL">BANCAL</option>
											<option value="BANGAN">BANGAN</option>
											<option value="BATONLAPOC">BATONLAPOC</option>
											<option value="BELBEL">BELBEL</option>
											<option value="BENEG">BENEG</option>
											<option value="BINUCLUTAN">BINUCLUTAN</option>
											<option value="BURGOS">BURGOS</option>
											<option value="CABATUAN">CABATUAN</option>
											<option value="CAPAYAWAN">CAPAYAWAN</option>
											<option value="CARAEL">CARAEL</option>
											<option value="DANACBUNGA">DANACBUNGA</option>
											<option value="MAGUISGUIS">MAGUISGUIS</option>
											<option value="MALOMBOY">MALOMBOY</option>
											<option value="MAMBOG">MAMBOG</option>
											<option value="MORAZA">MORAZA</option>
											<option value="NACOLCOL">NACOLCOL</option>
											<option value="OWAOG-NIBLOC">OWAOG-NIBLOC</option>
											<option value="PACO (POBLACION)">PACO (POBLACION)</option>
											<option value="PALIS">PALIS</option>
											<option value="PANAN">PANAN</option>
											<option value="PAREL">PAREL</option>
											<option value="PAUDPOD">PAUDPOD</option>
											<option value="POONBATO">POONBATO</option>
											<option value="PORAC">PORAC</option>
											<option value="SAN ISIDRO">SAN ISIDRO</option>
											<option value="SAN JUAN">SAN JUAN</option>
											<option value="SAN MIGUEL">SAN MIGUEL</option>
											<option value="SANTIAGO">SANTIAGO</option>
											<option value="TAMPO (POBLACION)">TAMPO (POBLACION)</option>
											<option value="TAUGTOG">TAUGTOG</option>
											<option value="VILLAR">VILLAR</option>
										</select>
										<small id="brgyHelp" class="form-text text-muted">Hold <strong>CTRL</strong> to select multiple Location</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">  
									<div class="form-group">
										<label for="edit_event_description">Description	</label>
										<textarea class="form-control" id="edit_event_description" name="edit_event_description" rows="3"></textarea>
									  </div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php if ($_SESSION['role'] == "OFFICE STAFF" || $_SESSION['role'] == "ADMINISTRATOR") { ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="edit_event()">Edit Event</button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- End Modal Edit Event -->
	
   <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	
	<!-- Vendor JS -->
    <script src="vendor/fullcalendar/moment.min.js"></script>
    <script src="vendor/fullcalendar/fullcalendar.main.min.js"></script>
    <script src="vendor/input-mask/inputmasked.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Include SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	
	<!-- Custom Script -->
    <script src="js/unserialized_JS.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Include jQuery library -->



	
</body>

</html>