// JavaScript Document

;jQuery.noConflict();

jQuery(document).ready(function($) {

	$('#calculate').click(function() {

		

		surface   = $('#surface').val();

		doors  	  = $('#doors').val();

		windows   = $('#windows').val();

		

		if( Math.floor(surface) == surface && $.isNumeric(surface)) {

			surface = parseInt(surface);

			surface_error = 0;

		} else {

			surface_error = 1;

		}

		if( Math.floor(doors) == doors && $.isNumeric(doors)) {

			doors = parseInt(doors);

			doors_error = 0;

		} else {

			doors_error = 1;

		}

		if( Math.floor(windows) == windows && $.isNumeric(windows)) {

			windows = parseInt(windows);

			windows_error = 0;

		} else {

			windows_error = 1;

		}	

				

		if($('#ceiling').is(':checked')) {

			ceiling = true;

		} else {

			ceiling = false;

		}

		

		height		   = 2.65;

		sidelength     = Math.sqrt(surface);

		scope 		   = sidelength * 4;

		wallsurface    = scope * height;  

		

		doorsurface    = doors * 2;

		windowsurface  = windows * 1.5;

		

		if(ceiling == true) {

			totalsurface	   = wallsurface - doorsurface - windowsurface + surface;

		} else {

			totalsurface	   = wallsurface - doorsurface - windowsurface;

		}

		

		paintvolume = totalsurface * 0.3;

		paintvolume = Math.round(paintvolume)

		

		if(surface_error == 1 || doors_error == 1 || windows_error == 1) {

			$('#paint_volume_calculator #result').show();

			$('#paint_volume_calculator #result').css('color','#F00');

			$('#paint_volume_calculator #result').text(messages.onlyinteger)

		} else {

			$('#paint_volume_calculator #result').show();

			$('#paint_volume_calculator #result').css('color','#090');

			$('#paint_volume_calculator #result').text('Sie benötigen '+paintvolume+' kg Farbe.');

		} 

	});

});