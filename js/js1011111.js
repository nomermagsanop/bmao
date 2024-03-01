(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()

// UPLOAD PREVIEW

$(document).on('change', '#inputupload', function() {
	var filesCount = $(this)[0].files.length;
	var textbox = $(this).prev();

	if (filesCount === 1) {
		var fileName = $(this).val().split('\\').pop();
		textbox.text(fileName);
	} else {
		textbox.text(filesCount + ' files selected');
	}

	if (typeof (FileReader) != "undefined") {
		var dvPreview = $("#divImageMediaPreview");
		dvPreview.html("");            
		$($(this)[0].files).each(function () {
			var file = $(this);                
			var reader = new FileReader();
			reader.onload = function (e) {
				var img = $("<img />");
				img.attr("style", "width: 100%;");
				img.attr("class", "rounded");
				img.attr("src", e.target.result);
				dvPreview.append(img);
			}
			reader.readAsDataURL(file[0]);                
		});
	} else {
	alert("This browser does not support HTML5 FileReader.");
	}
});


$(document).ready(function() {
	$('#dataTable').DataTable();

	$(".img_placeholder").attr("src","img/undraw_profile_"+(Math.floor(Math.random() * 4) + 1)+".svg");
	
	display_events();
	
	$("#inputContact").inputmask({
		mask: '99999999999',
		placeholder: '',
		showMaskOnHover: false,
		showMaskOnFocus: false,
		onBeforePaste: function (pastedValue, opts) {
			var processedValue = pastedValue;
			return processedValue;
		}
	});

	$('input#inputCPassword, input#inputPassword').keypress(function( e ) {
		if(e.which === 32) 
			return false;
	});
	
	$('input#inputCPassword').keyup(function () {
		'use strict';
			
		if ($('input#inputPassword').val() === $(this).val()) {
			$('.pass_match').html('MATCH');
			this.setCustomValidity('');
		} else {
			$('.pass_match').html('MISMATCH');
			this.setCustomValidity('Passwords must match');
		}
	});
	
	// $('#inputFilterBrgy').on('change', function() {
	// 	$('#event_brgy_filter').attr('action', "events.php?brgy=" + ($(this).val())).submit();
	// });
	// Filter by gender
    $('#inputFilterBrgy').on('change', function() {
        var brgy = $(this).val();
        $('#dataTable').DataTable().column(1).search(brgy).draw();
    });
	

}); //end document.ready block

function display_events(){
	var events = new Array();
	$.ajax({
		url: 'display_event.php',  
		dataType: 'json',
		success: function (response) {
			var result=response.data;
			$.each(result, function (i, item) {
				events.push({
					event_id: result[i].event_id,
					title: result[i].title,
					start: result[i].start,
					end: result[i].end,
					color: result[i].color,
					url: result[i].url
				}); 	
			})
			var calendar = $('#fcalendar').fullCalendar({
				defaultView: 'month',
				timeZone: 'local',
				editable: true,
				eventStartEditable: false,
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
					$('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
					$('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
					$('#event_entry_modal').modal('show');
				},
				events: events,
				eventRender: function(event, element, view) {
					$(".fc-day-grid-event").wrap( "<div class='fc-container'></div>" );
					element.find(".fc-content")
						   .append("<span id='event_delete' data-value='"+event.event_id+"' class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></span>");
					
					element.find("#event_delete").on("click", function() { console.log("click");
						// var calCheck = confirm("You want to delete this event?");   
						// if (calCheck) {
							$("#fcalendar").fullCalendar("removeEvents", event.event_id);
							


	Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  confirmButtonColor: '#dc3741',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
		type: "POST",
		url: 'delete_event.php',
		data: {event_id:event.event_id},
		success: function(response){
			console.log("Event Deleted");
			// location.reload();
			Swal.fire({
			  title: '',
			  text: 'Event Deleted Successfully',
			  icon: 'success',
			  confirmButtonText: 'OK'
			}).then((result) => {
			  if (result.isConfirmed) {
			    location.reload();
			  }
			});
			
		}
	});
  }
})
							
});
},
	eventClick: function(event, element, view) {
		$.each(result, function (i, item) {
			if(result[i].event_id == event.event_id) {
				$('#edit_event_id').val(result[i].event_id);
				$('#edit_event_name').val(result[i].title);
				$('#edit_event_start_date').val(result[i].start);
				$('#edit_event_end_date').val(result[i].end);
				var mVal=unserialize(result[i].location);
				mVal = mVal.join(",");
				$.each(mVal.split(","), function(i,e){
					$("#edit_event_location option[value='" + e + "']").prop("selected", true);
				});
				$('#edit_event_description').val(result[i].description);
			}
		})
		$('#event_edit_modal').modal('show');
	}
}); //end fullCalendar block
	
},//end success block
error: function (xhr, status) {
	alert(xhr.statusText);
}
});//end ajax block	
}


//end
function save_event(event) { 
    var program_id = $('#program_id').val();
    console.log('Program ID:', program_id);
    var event_start_date = $("#event_start_date").val();
    var event_end_date = $("#event_end_date").val();
    var event_location = $("#event_location").val();
    var event_description = $("#event_description").val();

    if (program_id == "" || event_start_date == "" || event_end_date == "" || event_location == "") {
        alert("Please enter all required details.");
        return false;
    }

    $.ajax({
        url: "save_event.php",
        type: "POST",
        dataType: 'json',
        data: {
            program_id: program_id,
            event_start_date: event_start_date,
            event_end_date: event_end_date,
            event_location: event_location,
            event_description: event_description,
           
        },
        success: function (response) {
            $('#event_entry_modal').modal('hide');
            if (response.status == true) {
                Swal.fire({
                    title: '',
                    text: 'Event Created Successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                alert(response.msg);
            }
        },
        error: function (xhr, status) {
            console.log('ajax error = ' + xhr.statusText);
        }
    });
    return false;
}


function edit_event() {
    var event_id = $('#edit_event_id').val();
    var program_id = $("#program_id").val();
    var event_start_date = $("#edit_event_start_date").val();
    var event_end_date = $("#edit_event_end_date").val();
    var event_location = $("#edit_event_location").val();
    var event_description = $("#edit_event_description").val();

    if (program_id == "" || event_start_date == "" || event_end_date == "" || event_location == "" || event_description == "") {
        alert("Please enter all required details.");
        return false;
    }

    $.ajax({
        url: "update_event.php",
        type: "POST",
        dataType: 'json',
        data: {
            event_id: event_id,
            program_id: program_id,
            event_start_date: event_start_date,
            event_end_date: event_end_date,
            event_location: event_location,
            event_description: event_description
        },
        success: function (response) {
            $('#event_edit_modal').modal('hide');
            if (response.status == true) {
                location.reload();
            } else {
                alert(response.msg);
            }
        },
        error: function (xhr, status) {
            console.log('ajax error = ' + xhr.statusText);
        }
    });

    return false;
}
