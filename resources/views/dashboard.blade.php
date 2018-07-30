@extends('layouts.dlayout')

@section('pageTitle','Dashboard')

@section('content')
{{-- <div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
</div> --}}

@include('layouts.dnav', ['active' => 'add_item'])

<div class="col-md-9">
    <div class="content" style="max-height: 900px; width: auto;">
    <div class="right-side-home">
        <div class="product-list">
            <div class="add-item-box">
                <h2>Add Item</h2>
                <div class="row">
                    <div class="col-md-6">
                        <form id="pform" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="name">Item Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name Here" required tabindex="1">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="">Category</label>
                                    <div>
                                      <select data-placeholder="Select Item Category" class="chosen-select" id="sub_category_id" name="sub_category_id" required tabindex="2">
                                        <option value=""></option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                <label>Upload Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" accept="image/png, image/jpeg" id="imgInp" name="image" required tabindex="3">
                                        </span>
                                    </span>
                                    <input id='urlname'type="text" class="form-control" readonly>
                                </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 btn-center">
                                    <span class="help-block" id="errors" style="display: none;">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <img src="{{ url('/images/loader.gif') }}" class="img-circle center-block " id="loader" style="display: none;" height="50" width="50" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 btn-center">
                                    <button type="submit" class="btn btn-login" id="submit_btn" tabindex="4">Add Item</button>
                                </div>
                            </div>
                            
                        	<!-- BEGIN MESSAGE -->
                            <div id="fmessage" style="display: none;">
                                <div style="padding: 5px;">
                                    <div id="inner-message" class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
                            <img id='img-upload' src="images/placeholder-img.jpg" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="rows">
                
                {{-- <div class="col-md-4">
                        <div class="p-box-lent">
                        <p class="person-name">Category: Name Here</p>
                        <img src="images/Iron.jpg" class="img-responsive">
                        <p>Product Name</p>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="p-box-lent">
                        <p class="person-name">Category: Name Here</p>
                        <img src="images/Iron.jpg" class="img-responsive">
                        <p>Product Name</p>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="p-box-lent">
                        <p class="person-name">Category: Name Here</p>
                        <img src="images/Iron.jpg" class="img-responsive">
                        <p>Product Name</p>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            
            //Alert Message FUNCTION
		    function alertMessage1(msg,behave)
	        {
	            $('#fmessage').hide();
	            if(behave == 'success')
	            {
	                $('#inner-message').removeClass('alert-danger');
	                $('#inner-message').addClass('alert-success');
	            }
	            else
	            {
	                $('#inner-message').removeClass('alert-success');
	                $('#inner-message').addClass('alert-danger');
	            }

	            $('#inner-message').find('span').html(msg);
	            $('#fmessage').show().delay(6000).fadeOut();
	        }
            
            function blshow()
            {
                $('#loader').show();
                $('#submit_btn').attr('disabled', 'disabled');
            }

            function blhide()
            {
                $('#loader').hide();
                $('#submit_btn').removeAttr('disabled');
            }

            function loadSubCategories(data)
            {
                var rows = '';
                $.each(data,function(index, value) {
                    rows += '<option value="'+value['id']+'">'+value['name']+'</option>';
                });
                return rows;
            }
            
            function loadCategories()
            {
                $.ajax({
                    url: '{{ route('categories') }}',
                    type: 'GET',
                    cache: true,
                    dataType: 'JSON',
                    success:function(data){
                        var sub_category_id = $('#sub_category_id');
                        sub_category_id.chosen('destroy');
                        sub_category_id.empty();
                        sub_category_id.append('<option value=""></option>');

                        $.each(data,function(index, value) {
                            sub_category_id.append('<optgroup label="'+index+'">'+loadSubCategories(value)+'</optgroup>'); 
                        });
                        sub_category_id.chosen();
                    },
                    error:function(){}
                }); 
            }
            loadCategories();

            function loadData()
            {
                $.ajax({
                    url:'{{ url('userproducts/'.Auth::user()->id.'/3') }}',
                    type: 'GET',
                    cache: true,
                    dataType: 'JSON',
                    success:function(data){

                        $('#rows').html('');
                        $.each(data,function(index, value) {
                            $('#rows').append('<div class="col-md-4">'+
                                '<div class="p-box-lent">'+
                                    '<p class="person-name">Category: '+value['category_name']+'</p>'+
                                    '<img src="{{ url('/images/uploads') }}/'+value['image']+'" class="" height="150" width="222">'+
                                    '<p>'+value['name']+'</p>'+
                                '</div>'+
                            '</div>'); 
                        });
                    },
                    error:function(){}
                }); 
            }            
            loadData();

            function add()
            {
                blshow();
                var fdata = new FormData( $('#pform')[0] ); 
                $.ajax({
                    url: '{{ route('addproduct') }}',
                    type: 'POST',
                    cache: true,
                    dataType: 'JSON',
                    data: fdata,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data['errors'])
                        {
                            $('#errors').show().html('');
                            $.each(data,function(index, value) {
                                $.each(value,function(index1, el) {
                                    $('#errors').append('<strong>'+el[0]+'</strong>');
                                });
                            });
                        }
                        else
                        {
                            alertMessage1('Added Successfully.','success');
                            $('#name,#imgInp').val('');
                            $("#urlname").val(" ");
                            $("#img-upload").attr("src","{{url('/images/placeholder-img.jpg')}}");
                            $('#sub_category_id').val('').trigger('chosen:updated');
                            loadData();
                        }
                        blhide();
                    },
                    error:function(){ 
                        alertMessage1('Error occured while adding product.','error');
                        blhide();
                        }
                });                
            }

            $('#pform').submit(function(e) {
                e.preventDefault();
                add();
            });
        });  
    </script>
    
@endsection
