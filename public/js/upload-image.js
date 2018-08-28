$(document).ready( function() {
    
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),

			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		
		function readURL(input,id) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		        	if (id == "img-upload") {
		        		$('#img-upload').attr('src', e.target.result);
		        	}
		        	else
		            	$('#img-upload-bg').css('background-image', 'url('+e.target.result+')');
		            	// $('#'+id).attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this,'img-upload');
		});
		
		$("#imgInp2").change(function(){
		    readURL(this,'img-upload-bg');
		});
		$("#clear").click(function(){
		    $('#img-upload').attr('src','');
		    $('#urlname').val('');
		});
	});