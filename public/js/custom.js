function calert(msg,type) {
	$.iaoAlert({
		msg: msg,
		type: type,
	  	mode: "dark",
		autoHide: true,
	  	fadeTime: "500",
	  	closeButton: true,
	  	closeOnClick: false,
	  	position: 'top-right',
	  	fadeOnHover: true,
	  	zIndex: "10000",
	  	alertClass: ''
	})
}
function changeImage (url) {
    var fdata = new FormData( $('#user_image_form')[0] ); 
    $.ajax({
        url: url,
        type: 'POST',
        cache: true,
        dataType: 'JSON',
        data: fdata,
        contentType: false,
        processData: false,
        success:function(data){
            if(data['errors']) {
                $.each(data,function(index, value) {
                    $.each(value,function(index1, el) {
                        calert(el,'error');
                    });
                });
            }
            else if( data['updated'] == 'true' ) {
            	calert('Image updated successfully.','success');
            }
            else {
                calert('Error occured while changing image.','error');
            }
        },
        error: function () { 
            calert('Error occured while changing image.','error');
        }
    });                
}
function setNotifications(url,token) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: {_token: token},
        cache:true
    })
    .done(function() {
        
    })
    .fail(function() {
        calert("Something went wrong!","error");
        setNotifications(url,token);
    });    
}