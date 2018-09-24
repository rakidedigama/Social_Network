@extends('layouts.dlayout')

@section('pageTitle','Borrowals')

@section('content')

@include('layouts.dnav', ['active' => 'borrowed_item'])

<div class="col-md-9">
	<div class="content" style="height:900px; width: auto;">
		<div class="right-side-home">
			<div class="product-list">
				<div class="row" id="rows">
					<table id="dataTable" class="table table-striped">
				    <thead>
				      <tr>
				        <th>Date</th>
				        <th>Thumbnail</th>
				        <th>Owner</th>
				        <th>Due Date</th>
				        <th>Status</th>
				        <th>Actions</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach ($data as $val)
				    		<tr>
				    			<td>
                  	@php
                  		$date = explode(' ',$val->date_borrowal);
                  		echo date("d M Y", strtotime($date[0]));
                  	@endphp
                  </td>
					    		<td>
					    			<a href="{{ route('viewBook',$val->product_id) }}">
					    				<img src="{{ url('/images/uploads/280').'/'.$val->image }}" height="100" width="100">
				    				</a>
                  </td>
                  <td>
                  	<a href="{{ route('profile',$val->lent_user) }}">
                  		{{ $val->lenter }}
                  	</a>
                  </td>
                  <td>
                  	
                  </td>
                  <td>
                  	@php
                  		$status = '';
                  		$disabled = '';
                  		if ($val->status == 3) {
	                  		$status = 'Pending';
	                  		$disabled = '';
                  		}
                  		else if ( $val->status == 5 ) {
                				$status = 'Returned';
	                  		$disabled = '';
                  		}
	                  	else {
	                  		$status = 'Borrowed';
	                  		$disabled = 'disabled';
	                  	}
	                  	echo $status;
                  	@endphp
                  </td>
                  <td>
                  	@if ($val->status != 5)
                  		<button type="button" {{ $disabled }} class="btn btn-success confirm_btn" request_id="{{ $val->request_id }}" >Confirm Borrowal</button>
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

            function loadData(skip,limit)
            {
            	$('#rows').append('<div class="col-md-12">'+
            		'<img src="{{ url('/images/loader.gif') }}" class="img-circle center-block loader" height="50" width="50" >'+
    					'</div>');
                $.ajax({
                  url: '{{ url('/userborrowedproducts/'.Auth::user()->id) }}/'+skip+'/'+limit,
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
                          $('#rows').append('<div class="col-md-3">'+
                              '<div class="p-box-lent borrowed-itm">'+
                                  '<p class="person-name">Lender: '+value['lent_name']+'</p>'+
                                  '<div class="p-img-al" style=\"background-image: url(\'{{ url('/images/uploads') }}/'+value['image']+'\')\"></div>'+
                                  '<p>'+value['name']+'</p>'+
                              '</div>'+
                          '</div>'); 
                      });

                      //Products Height Code
							        $.fn.equalHeights = function() {
				                var maxHeight = 0,
				                    $this = $(this);
				        
				                $this.each( function() {
				                	console.log('loop');
				                    var height = $(this).innerHeight();
				        
			                    if ( height > maxHeight ) { maxHeight = height; }
			                });
			        
			                return $this.css('height', maxHeight);
						            };                
						            $('.p-box-lent').equalHeights();
	                        
                      $('.loader').parent('div').remove();
                    }
                  },
                  error:function(){ $('.loader').parent('div').remove(); }
                }); 
            }

        	$(document).on('click','.confirm_btn',function(e) {
          	
          	var request_id = $(this).attr('request_id'),
          		  status 	   = 4,
          	 	  btn 	     = $(this);

        		$.ajax({
        			url: '{{ route('updatereqborrow') }}',
        			type: 'POST',
        			dataType: 'JSON',
        			cache: true,
        			data: {_token: '{{ csrf_token() }}',request_id:request_id,status:status },
        			beforeSend: function() {
        				btn.attr('disabled','disabled');
        			},
        			success:function(data){
        				if( data["error"] ) {
        					btn.removeAttr('disabled');
        					calert(data["error"],'error');
        				}
        				else if( data["updated"] == "true" ) {	        					
      						btn.closest('tr').find('td').eq(0).text(data['date_borrowal']);
      						btn.closest('tr').find('td').eq(4).text('Borrowed');
      						calert('Borrowal Confirmed.','success');
        				}
	    					else {
	    						btn.removeAttr('disabled');
	    						calert('Error occured while updating request status.','error');
	    					}
        			},
        			error:function() { 
        				calert('Error occured while updating request status.','error');
        				btn.removeAttr('disabled');
        			}
        		});
          });
        });  
    </script>
    
@endsection
