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
                      if($val->date_borrowal!=NULL && $val->date_borrowal!="") {
                    		$bdate = explode(' ',$val->date_borrowal);
                    		echo date("d M Y", strtotime($bdate[0]));
                      }
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
                    @php
                      if($val->due_date!=NULL && $val->due_date!="") {
                        $ddate = explode(' ',$val->due_date);
                        echo date("d M Y", strtotime($ddate[0]));
                      }
                    @endphp
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
                    @elseif ($val->status == 5 && $val->ratings==0)
                      {{-- data-toggle="modal" data-target="#reviewModal{{$val->request_id}}" --}}
                      <button type="button" class="btn btn-success modal_review_btn">Submit Review</button>
                      <!-- Review Modal -->
                      <div class="modal fade reviewModal" id="reviewModal{{$val->request_id}}" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel{{$val->request_id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="reviewModalLabel{{$val->request_id}}">Book Review</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" class="reviewForm">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="form-group">
                                  Book title : {{$val->name}}
                                  by Author : {{$val->author}}
                                </div>
                                <div class="form-group">
                                  <select class="rate" name="rate">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <textarea name="review" class="form-control" style="resize: none;" rows="4" maxlength="50" placeholder="Write a few words about this book and your experience with the book lender to help fellow readers?"></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success review_btn" request_id="{{ $val->request_id }}" >
                                  Submit
                                  <img src="{{ url('/images/loader.gif') }}" height="20" width="20" style="display: none;" class="loader" />
                                </button>
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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

@section('header')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/css-stars.css') }}">
@endsection

@section('footer')
  <script src="{{url('/js/jquery.barrating.min.js')}}"></script>
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
              btn.closest('tr').find('td').eq(3).text(data['due_date']);
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

      // Rating 
      $('.rate').barrating({
        theme: 'css-stars'
      });

      $('.reviewModal').on('hidden.bs.modal', function () {
        $(this).find('.reviewForm').trigger('reset');
      });

      $(document).on('click','.modal_review_btn',function(){
        $(this).parent().find('.reviewModal').modal('show');
      });

      $('.reviewForm').submit(function(e){
        e.preventDefault();
        var _this = $(this),
            request_id = _this.find('.review_btn').attr('request_id');
        $.ajax({
          url: '{{ route('review') }}',
          type: 'POST',
          dataType: 'JSON',
          data: _this.serialize() + '&request_id=' + request_id,
          cache:true,
          beforeSend: function(){
            _this.find('.loader').show();
            _this.find('.review_btn').attr('disabled','disabled');
          },
          success: function(data){
            if(data['error']) 
              calert(data['error'],'error');
            else if(data['inserted']=='true') {
              _this.closest('tr').find('.reviewModal').modal('hide');
              calert('Submitted successfully.','success');
              _this.closest('tr').find('td').eq(5).find('.modal_review_btn').remove();
            }
            else 
              calert('Error occured in review book.','error');
          },
          error: function(){
            calert('Error occured in review book.','error');
          },
          complete: function(){
            _this.find('.loader').hide();
            _this.find('.review_btn').removeAttr('disabled');
          },
        });
      });
    });  
  </script>
    
@endsection
