@extends('layouts.dlayout')

@section('pageTitle','Owned Items')

@section('content')

@include('layouts.dnav', ['active' => 'owned_item'])

<div class="col-md-9">
	<div class="content" style="height:900px; width: auto;">
		<div class="right-side-home">
			<div class="product-list">
				<div class="row" id="rows">
					{{-- <div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>--}}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){

        	//Masonry Function
        	function mm()
        	{
        		$.fn.equalHeights = function() {
                    var maxHeight = 0,
                        $this = $(this);
            
                    $this.each( function() {
                        var height = $(this).innerHeight();
            
                        if ( height > maxHeight ) { maxHeight = height; }
                    });
            
                    return $this.css('height', maxHeight);
                };

                // auto-initialize plugin
                $('[data-equal]').each(function(){
                    var $this  = $(this),
                        target = $this.data('equal');
                    $this.find(target).equalHeights();
                });
                $('.p-box-lent').equalHeights();
        	}

        	//data-dismiss="alert"
		    //Alert Message FUNCTION
		    function alertMessage1(msg,behave,id,inner_id)
	        {
	            $('#'+id).hide();
	            if(behave == 'success')
	            {
	                $('#'+inner_id).removeClass('alert-danger');
	                $('#'+inner_id).addClass('alert-success');
	            }
	            else
	            {
	                $('#'+inner_id).removeClass('alert-success');
	                $('#'+inner_id).addClass('alert-danger');
	            }

	            $('#'+inner_id).find('span').html(msg);
	            $('#'+id).show().delay(6000).fadeOut();
	        }

	        $(document).on('click','.close',function(e){
				e.preventDefault();
				var id = $(this).attr('data_id');
				$('#'+id).hide();
			});

            function loadData(skip,limit)
            {
            	$('#rows').append('<div class="col-md-12">'+
            		'<img src="{{ url('/images/loader.gif') }}" class="img-circle center-block loader" height="50" width="50" >'+
        		'</div>');
                $.ajax({
                    url: '{{ url('userproducts/'.Auth::user()->id) }}/'+skip+'/'+limit,
                    dataType: 'JSON',
                    cache: true,
                    success:function(data){

                    	if(data['msg'])
                    	{
                    		$('.loader').parent('div').remove();
                    	
                			$('#rows').append('<div class="col-md-12">'+
                				'<p class="text text-danger center-block">'+data['msg']+'</p>'+
            				'</div>');
                    	}
                    	else
                    	{
	                        $.each(data,function(index, value) {

	                        	var mssg ='<div id="message'+value['id']+'" style="display: none;">'+
                                            '<div style="padding: 5px;">'+
                                                '<div id="inner-message'+value['id']+'" class="alert alert-success">'+
                                                    '<button type="button" class="close" data_id="message'+value['id']+'" >&times;</button>'+
                                                    '<span></span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'; 

	                            $('#rows').append('<div class="col-md-4 no-mrg-b" id="p'+value['id']+'">'+
	                                '<div class="p-box-lent">'+
	                                    '<p class="person-name">Category: '+value['category_name']+'</p>'+
	                                    '<img src="{{ url('/images/uploads') }}/'+value['image']+'" class="" height="150" width="222" >'+
	                                    '<p>'+value['name']+'</p>'+

                                    	'<!-- Trigger the modal with a button -->'+                                        
                                        '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'+value['id']+'" >'+
                                        '<i class="fa fa-minus-square"></i> Delete'+
                                        '</button>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['id']+'" class="modal fade" role="dialog">'+
                                          '<div class="modal-dialog">'+

                                            '<!-- Modal content-->'+
                                            '<div class="modal-content">'+
                                              '<div class="modal-header">'+
                                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                                '<h4 class="modal-title">Delete</h4>'+
                                              '</div>'+
                                              '<div class="modal-body">'+
                                                '<p>Are you sure you want to delete <strong class="text text-danger">'+value['name']+'</strong> ?</p>'+
                                              '</div>'+
                                              '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                                '<button type="button" class="btn btn-primary delete_btn" data-dismiss="modal" id="'+value['id']+'" mssg_id="message'+value['id']+'" mssg_inner_id="inner-message'+value['id']+'" p_id="p'+value['id']+'" >Delete</button>'+
                                              '</div>'+
                                            '</div>'+

                                          '</div>'+
                                        '</div>'+

                                        mssg+

	                                '</div>'+
	                            '</div>'); 
	                        });

	                        mm();
	                        $('.loader').parent('div').remove();
                        }
                    },
                    error:function(){ $('.loader').parent('div').remove(); }
                }); 
            }            
            loadData(0,12);

            //Delete Function
            $(document).on('click','.delete_btn',function(e) {
            	
            	var product_id 	  = $(this).attr('id'),
            		mssg_id       = $(this).attr('mssg_id'),
            		mssg_inner_id = $(this).attr('mssg_inner_id'),
            		p_id          = $(this).attr('p_id'),
            		btn 	      = $(this);

        		$.ajax({
        			url: '{{ route('deleteproduct') }}',
        			type: 'POST',
        			dataType: 'JSON',
        			cache: true,
        			data: { _token: '{{ csrf_token() }}',id:product_id },
        			success:function(data){
        				if( data["deleted"] == "true" )
        				{
        					$('#'+p_id).slideUp();        					
    						alertMessage('Deleted Sucessfully.','success');
        				}
        				else if( data["error"] )
        					alertMessage1(data["error"],'error',mssg_id,mssg_inner_id);
    					else
    						alertMessage('Error occured while Deleting item.','error');
        			},
        			error:function(){ alertMessage('Error occured while Deleting item.','error'); }
        		});
            });

			$(".content").mCustomScrollbar({
				scrollButtons:{
					enable:true
				},
				callbacks:{
					onScrollStart:function(){ myCallback(this,"#onScrollStart") },
					onScroll:function(){ myCallback(this,"#onScroll") },
					onTotalScroll:function(){ 
						myCallback(this,"#onTotalScroll");
						var n = $('#rows').children().length;
				     	loadData(n,3);
						},
					onTotalScrollOffset:60,
					onTotalScrollBack:function(){ myCallback(this,"#onTotalScrollBack") },
					onTotalScrollBackOffset:50,
					whileScrolling:function(){ 
						myCallback(this,"#whileScrolling"); 
						$("#mcs-top").text(this.mcs.top);
						$("#mcs-dragger-top").text(this.mcs.draggerTop);
						$("#mcs-top-pct").text(this.mcs.topPct+"%");
						$("#mcs-direction").text(this.mcs.direction);
						$("#mcs-total-scroll-offset").text("60");
						$("#mcs-total-scroll-back-offset").text("50");
					},
					alwaysTriggerOffsets:false
				}
			});
			
			function myCallback(el,id){
				if($(id).css("opacity")<1){return;}
				var span=$(id).find("span");
				clearTimeout(timeout);
				span.addClass("on");
				var timeout=setTimeout(function(){span.removeClass("on")},350);
			}
			
			$(".callbacks a").click(function(e){
				e.preventDefault();
				$(this).parent().toggleClass("off");
				if($(e.target).parent().attr("id")==="alwaysTriggerOffsets"){
					var opts=$(".content").data("mCS").opt;
					if(opts.callbacks.alwaysTriggerOffsets){
						opts.callbacks.alwaysTriggerOffsets=false;
					}else{
						opts.callbacks.alwaysTriggerOffsets=true;
					}
				}
			});
        });  
    </script>
    
@endsection
