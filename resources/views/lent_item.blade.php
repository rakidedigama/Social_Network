@extends('layouts.dlayout')

@section('pageTitle','Lent Items')

@section('content')

@include('layouts.dnav', ['active' => 'lent_item'])

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
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div>
					<div class="col-md-4">
							<div class="p-box-lent">
							<p class="person-name">Person Name Here</p>
							<img src="images/Iron.jpg" class="img-responsive">
							<p>Product Name</p>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){

            function loadData()
            {
                $.ajax({
                    url: '/userproducts/{{Auth::user()->id}}/3',
                    type: 'GET',
                    dataType: 'JSON',
                    success:function(data){

                        $('#rows').html('');
                        $.each(data,function(index, value) {
                            $('#rows').append('<div class="col-md-4">'+
                                '<div class="p-box-lent">'+
                                    '<p class="person-name">Category: '+value['category_name']+'</p>'+
                                    '<img src="/images/uploads/'+value['image']+'" class="img-responsive">'+
                                    '<p>'+value['name']+'</p>'+
                                '</div>'+
                            '</div>'); 
                        });
                    },
                    error:function(){}
                }); 
            }            
            loadData();
        });  
    </script>
    
@endsection
