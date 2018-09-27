@extends('layouts.dlayout')

@section('pageTitle','Owned Items')

@section('content')
	@include('layouts.dnav', ['active' => 'owned_item'])
	<div class="col-md-9">
		<div class="content" style="height:900px; width: auto;">
			<div class="right-side-home">
				<div class="product-list">
					<div class="row" id="rows">
						<table id="dataTable" class="table table-striped">
					    <thead>
					      <tr>
					        <th>Thumbnail</th>
					        <th>Date added</th>
					        <th>Rentals</th>
					        <th>Requests</th>
					        <th>Availability</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach ($data as $val)
					    		<tr>
						    		<td>
						    			<a href="{{ route('viewBook',$val->id) }}">
							    			<img src="{{ url('/images/uploads/280').'/'.$val->image }}" height="100" width="100">
							    		</a>
	                  </td>
	                  <td>
	                  	@php
	                  		$date = explode(' ',$val->date);
	                  		echo date("d M Y", strtotime($date[0]));
	                  	@endphp
	                  </td>
	                  <td>
	                  	{{ $val->rental_count }}
	                  </td>
	                  <td>
	                  	{{ $val->requests }}
	                  </td>
	                  <td>
	                  	@if ($val->viewstatus == 1)
                        <span class="text text-success">Available</span>
                      @else
                        <span class="text text-danger">Not Available</span>
                      @endif
	                  </td>
                  </tr>
					    	@endforeach
					    </tbody>
				    </table>
				    <div class="row">
              <div class="col-md-12">
                <div class="page-nation home-pagina">
                  <?php echo $data->render() ?>         
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer')
  <script type="text/javascript">
    $(document).ready(function(){

      function loadData(skip,limit) {
        	$('#rows').append('<div class="col-md-12">'+
        		'<img src="{{ url('/images/loader.gif') }}" class="img-circle center-block loader" height="50" width="50" >'+
    			'</div>');
            $.ajax({
                url: '{{ url('userproducts/'.Auth::user()->id) }}/'+skip+'/'+limit,
                dataType: 'JSON',
                cache: true,
                success:function(data) {

                	if(data['msg']) {
                		$('.loader').parent('div').remove();
                	
            			$('#rows').append('<div class="col-md-12">'+
            				'<p class="text text-danger center-block">'+data['msg']+'</p>'+
        				'</div>');
                	}
                	else
                	{
                    $.each(data,function(index, value) {

                        $('#rows').append('<div class="col-md-3 no-mrg-b" id="p'+value['id']+'">'+
                            '<div class="p-box-lent owned-books">'+
                                '<p class="person-name">Category: '+value['category_name']+'</p>'+
                                '<div class="owned-book-blck">'+
                                '<div class="p-img-al" style=\"background-image: url(\'{{ url('/images/uploads/280') }}/'+value['image']+'\')\"></div>'+
                                '</div>'+
                                '<p>'+value['name']+'</p>'+

                              	'<!-- Trigger the modal with a button -->'+

                              	'<div class="owned-book-del">'+                                      
                                  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'+value['id']+'" >'+
                                  '<i class="fa fa-minus-square"></i> Delete'+
                                  '</button>'+
                                  '</div>'+

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
                            '</div>'+
                        '</div>'); 
                    });
                  }
                },
                error:function(){ $('.loader').parent('div').remove(); }
            }); 
        }            
      // loadData(0,12);

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
    				if( data["deleted"] == "true" ) {
    					$('#'+p_id).slideUp();        					
							calert('Deleted Sucessfully.','success');
    				}
    				else if( data["error"] )
    					calert(data["error"],'error');
  					else
  						calert('Error occured while Deleting item.','error');
    			},
    			error:function() { 
    				calert('Error occured while Deleting item.','error'); 
    			}
    		});
      });

    });  
  </script>   
@endsection
