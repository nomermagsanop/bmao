<!-- Delete farmer -->
<div class="modal fade" id="delete_<?php echo $row['farmer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Delete Farmer</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">	
            	<p class="text-center text-danger">Are you sure you want to delete?</p>
				<h5 class="text-center text-primary">Full Name: <span class="text-danger"><?php echo $first_name." ".$last_name; ?></span></h5>
				<h5 class="text-center text-primary">Address: <span class="text-danger"><?php echo $row['brgy']?></span></h5>
                <h5 class="text-center text-primary">Land Size: <span class="text-danger"><?php echo $row['land_size']?>Hectare</span></h5>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-x mr-1"></i>Cancel</button>
                <a href="delete_farmer.php?farmer_id=<?php echo $row['farmer_id']; ?>" class="btn btn-danger"><i class="fa fa-trash m-1"></i>Yes</a>
            </div>

        </div>
    </div>
</div>



<!-- Delete staff-->
<div class="modal fade" id="delete_<?php echo $row['staff_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Delete Staff</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">    
                <p class="text-center text-danger">Are you sure you want to delete?</p>
                <h5 class="text-center text-primary">Full Name: <span class="text-danger"><?php echo $first_name." ".$last_name; ?></span></h5>
                <!-- <h5 class="text-center text-primary">School ID: <span class="text-danger">\</span></h5> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-x mr-1"></i>Cancel</button>
                <a href="delete_staff.php?staff_id=<?php echo $row['staff_id']; ?>" class="btn btn-danger"><i class="fa fa-trash m-1"></i>Yes</a>
            </div>

        </div>
    </div>
</div>

<!-- Delete personnel-->

<div class="modal fade" id="delete_<?php echo $row['personnel_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">Delete Personnel</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">    
                <p class="text-center text-danger">Are you sure you want to delete?</p>
                <h5 class="text-center text-primary">Full Name: <span class="text-danger"><?php echo $first_name." ".$last_name; ?></span></h5>
                <h5 class="text-center text-primary">Position: <span class="text-danger"><?php echo $rank; ?></span></h5>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-x mr-1"></i>Cancel</button>
                <a href="delete_personnel.php?personnel_id=<?php echo $row['personnel_id']; ?>" class="btn btn-danger"><i class="fa fa-trash m-1"></i>Yes</a>
            </div>

        </div>
    </div>
</div>



<!-- Delete event -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEventModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>


