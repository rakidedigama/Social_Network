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
                        alertMessage(el[0],'error');
                        // $('#errors').append('<strong>'+el[0]+'</strong>');
                    });
                });
            }
            else if( data['updated'] == 'true' ) {
            	alertMessage('Image Updated Successfully.','success');
            }
            else {
                alertMessage('Error occured while updating image.','error');
            }
        },
        error: function () { 
            alertMessage('Error occured while updating image.','error');
        }
    });                
}
