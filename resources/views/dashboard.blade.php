@extends('layouts.layout')

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

    <div class="fh5co-loader"></div>
    
    <div id="page">
        @include('layouts.nav', ['active' => 'dashboard'])

    <div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url({{ url('/images/Background.jpg') }});">
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3">
                    <img src="{{ url('/images/profile-img.png') }}" class="img-responsive">
                </div>
                <div class="col-md-9">
                    <div class="profile-info-box">
                        <h3>User Personal details</h3>
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <p><i class="icon-man"></i>Name: <span>{{Auth::user()->name}}</span></p>
                                    </li>
                                    <li>
                                        <p><i class="icon-email"></i>Email: <span>{{ Auth::user()->email }}</span></p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <p><i class="icon-location"></i>Location: <span>{{ $city }}</span></p>
                                    </li>
                                    <li>
                                        <p><i class="icon-phone"></i>Phone: <span>+{{ Auth::user()->phone }}</span></p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-menu-left-side">
                        <button class="btn btn-add-item  active"><i class="icon-file-add"></i>ADD NEW ITEM</button>
            <div class="profile-other-menu">
                <button class="btn btn-profile-menu">Owned Items</button>
                <button class="btn btn-profile-menu">Borrow Requests</button>
                <button class="btn btn-profile-menu">Lent Items</button>
                <button class="btn btn-profile-menu">Borrowed Items</button>
            </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content" style="max-height: 900px; width: auto;">
                        <div class="right-side-home">
                            <div class="product-list">
                                <div class="add-item-box">
                                    <h2>Add Item</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="itemName">Item Name</label>
                                                    <input type="text" id="itemName" class="form-control" placeholder="Name Here">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="">Category</label>
                                                    <div>
                                                      <select data-placeholder="Select Item Category" class="chosen-select" id="sub_category_id" tabindex="5">
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
                                                            Browse… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
                                                        </span>
                                                    </span>
                                                    <input id='urlname'type="text" class="form-control" readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12 btn-center">
                                                    <button class="btn btn-login">Add Item</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <img id='img-upload' src="images/placeholder-img.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
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
                                    </div>
                                    <div class="col-md-4">
                                            <div class="p-box-lent">
                                            <p class="person-name">Category: Name Here</p>
                                            <img src="images/Iron.jpg" class="img-responsive">
                                            <p>Product Name</p>
                                        </div>
                                    </div>
                                    
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
                    url: '/categories',
                    type: 'GET',
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
        });  
    </script>
    
@endsection
