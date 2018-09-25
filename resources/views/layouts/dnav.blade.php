<div class="col-md-3">
	<!-- <img src="{{ url('/images/profile-img.png') }}" class="img-responsive"> -->
	<div class="pro-dash-img" id="img-upload-bg" style="background-image: url('{{ url('/images/uploads/users/200').'/'.Auth::user()->pimage }}') "  >
	</div>
    <form id="user_image_form" method="post">
    	{{ csrf_field() }}
		<div class="input-group">
		    <span class="input-group-btn btn-up-mrg">
		        <span class="btn btn-default btn-file btn-pro-cus">
		            Browse… <input type="file" accept="image/png, image/jpeg" id="imgInp2" name="pimage" id="pimage" required tabindex="0">
		        </span>
		        <button type="submit"class="btn-pro-up">Upload</button>
		    </span>
	    	<input id='urlname2' type="text" class="form-control" readonly style="display: none;">	
		</div>
    </form>
	<div class="profile-info-box">
	    <p>User Personal details</p>
	    <ul>
            <li>
                <p><i class="icon-man"></i> <span>{{ Auth::user()->name .' '. $repo['books'] }} 
                 <i class="icon-drop-up-arrow size-13 green-color"></i> {{ $repo['lent'] }} <i class="icon-drop-down-arrow size-13 brown-color"></i> {{ $repo['borrow'] }}</span></p>
            </li>
            <li>
                <p><i class="icon-location"></i> <span>{{ $city }}</span></p>
            </li>
	    </ul>
	</div>
    <div class="profile-menu-left-side">
        <a href="{{ route('dashboard') }}" class="btn btn-add-item  {{ $active=='add_item'?'active':'' }}"><i class="icon-file-add"></i>ADD NEW ITEM</a>
        <div class="profile-other-menu">
            <a href="{{ route('owneditem') }}" class="btn btn-profile-menu {{ $active=='owned_item'?'active':'' }}">Owned Items</a>
            <a href="{{ route('sentReq') }}" class="btn btn-profile-menu {{ $active=='sent_requests'?'active':'' }}">Sent Requests</a>
            <a href="{{ route('borrowreq') }}" class="btn btn-profile-menu {{ $active=='borrowreq'?'active':'' }}">Received Requests</a>
            <a href="{{ route('lentitem') }}" class="btn btn-profile-menu {{ $active=='lent_item'?'active':'' }}">Rentals</a>
            <a href="{{ route('borroweditem') }}" class="btn btn-profile-menu {{ $active=='borrowed_item'?'active':'' }}"> Borrowals</a>
            
        </div>
    </div>
</div>