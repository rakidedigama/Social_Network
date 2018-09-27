@extends('layouts.dlayout')

@section('pageTitle','Sent Requests')

@section('content')
	@include('layouts.dnav', ['active' => 'sent_requests'])
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
					        <th>Status</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach ($data as $val)
					    		<tr>
	                  <td>
	                  	@php
	                  		$date = explode(' ',$val->date);
	                  		echo date("d M Y", strtotime($date[0]));
	                  	@endphp
	                  </td>
                    <td>
                      <a href="{{ route('viewBook',$val->product_id) }}">
                        <img src="{{ url('/images/uploads/280').'/'.$val->image }}" height="100" width="100">
                      </a>
                    </td>
	                  <td>
	                  	<a href="{{ route('profile',$val->lent_user) }}">{{ $val->user }}</a>
	                  </td>
	                  <td>
                      @php
                        if( $val->status == 1 || $val->status == 3 || $val->status == 4 )
                          echo 'Accepted';
                        else if( $val->status == 2 )
                          echo 'Rejected';
                      	else if( $val->status == 5 )
                      		echo 'Returned';
                        else
                          echo 'Pending';
                      @endphp
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
