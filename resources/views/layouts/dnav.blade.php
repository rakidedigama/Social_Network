<div class="col-md-3">
    <div class="profile-menu-left-side">
        <a href="{{ route('dashboard') }}" class="btn btn-add-item  {{ $active=='add_item'?'active':'' }}"><i class="icon-file-add"></i>ADD NEW ITEM</a>
        <div class="profile-other-menu">
            <a href="{{ route('owneditem') }}" class="btn btn-profile-menu {{ $active=='owned_item'?'active':'' }}">Owned Items</a>
            <a href="" class="btn btn-profile-menu {{ $active=='request_item'?'active':'' }}">Borrow Requests</a>
            <a href="{{ route('lentitem') }}" class="btn btn-profile-menu {{ $active=='lent_item'?'active':'' }}">Lent Items</a>
            <a href="" class="btn btn-profile-menu {{ $active=='borrowed_item'?'active':'' }}">Borrowed Items</a>
        </div>
    </div>
</div>