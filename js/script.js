$(document).ready(function(){

	// show loading spinner
	$('.se-pre-con').fadeIn('slow');

	// disable input before data finish loading
	$('#progcode').prop('disabled', true);
	$('.coursecode').prop('disabled', true);
	$('#fetch').prop('disabled', true);

	// initialize Select2
	$(function(){
		$('#progcode,.coursecode').select2();
	});

	$(document).on('change','.coursecode',function(){
		$('.coursecode').select2("destroy"); // destroy Select2 first before clone
    	$(this).clone().appendTo('#cloneTarget').after('<br>'); // clone
		$('select:last').focus();
		$('.coursecode').select2(); // re-initialize 
    });

	// populate select box
	$(function(){	

		// programmes list
		$.getJSON("./api.php?option=listprogrammes", function(data){
			var programmes = "";
	        $.each(data, function(i, obj){
	        	var options= "";
	        	programmes += "<option value='"+obj.url+"'>"+obj.code+"</option>";
	        });

	        // append to select box
	        $('#progcode').append(programmes);
	    })
	    .done(function() {
			// done
			toastr.success('Programmes Fetched.');
			$('#progcode').prop('disabled', false);
		})
		.fail(function() {
			// failed
			toastr.error('Error Fetching Programmes.');
		});

		// courses list
		$.getJSON("./api.php?option=listcourses", function(data){
			var courses = "";
	        $.each(data, function(i, obj){
	        	var options= "";
	        	courses += "<option value='"+obj+"'>"+obj+"</option>";
	        });

	        // append to select box
	        $('.coursecode').append(courses);
	    })
	    .done(function() {
			// done
			toastr.success('Courses Fetched.');
			$('.coursecode').prop('disabled', false);
			$('#fetch').prop('disabled', false);
			$('.se-pre-con').fadeOut('slow');
		})
		.fail(function() {
			// failed
			toastr.error('Error Fetching courses.');
			$('.se-pre-con').fadeOut('slow');
		});

	});	

	// fetch timetable
	$('#fetch').click(function(){
		// show loading
		$('.se-pre-con').fadeIn('slow');

		// clear old data
		$('#timetable').empty();

		var param = $('#inputForm').serialize();

		$('#progcode').prop('disabled', true);
		$('.coursecode').prop('disabled', true);
		$('#fetch').prop('disabled', true);

		// get timetable
		$.getJSON("./api.php?option=timetable&"+param, function(data){

			var tabletop = "<table class='table table-bordered table-hover' id='resultTable'>"
							+"<thead>"
								+"<tr class='bg-info text-white'>"
									+"<th>Programme</th>"
                                    +"<th>Subject</th>"
									+"<th>Week</th>"
									+"<th>Date</th>"
									+"<th>Time Start</th>"
                                    +"<th>Time End</th>"
								+"</tr>"
							+"</thead>"
							+"<tbody>";

	        // append data
	        var results = "";
	        for(var i=0;i<data.length;i++)
	        {
	        	results +=  "<tr>"
                                +"<td>"+data[i]['programme']+"</td>"
				        		+"<td>"+data[i]['subject']+"</td>"
				        		+"<td>"+data[i]['details']['week']+"</td>"
				        		+"<td>"+data[i]['details']['date']+"</td>"
				        		+"<td>"+data[i]['details']['time_start']+"</td>"
                                +"<td>"+data[i]['details']['time_end']+"</td>"
				        	+"</tr>";
	        }

	        var tablebot = "</tbody>"
	        				+"</table>";

	        $('#timetable').append('<div class="card mx-auto table-responsive">'+tabletop+results+tablebot+'</div>').hide().fadeIn('slow');
	    })
	    .done(function() {
			toastr.error('Timetable Fetched.');
			$('#progcode').prop('disabled', false);
			$('.coursecode').prop('disabled', false);
			$('#fetch').prop('disabled', false);
			$('.se-pre-con').fadeOut('slow');
		})
		.fail(function() {
			toastr.success('Timetable Fetched. Saved to Database.');
			$('#progcode').prop('disabled', false);
			$('.coursecode').prop('disabled', false);
			$('#fetch').prop('disabled', false);
			$('.se-pre-con').fadeOut('slow');
		});
	});

});
