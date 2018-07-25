<div class="col-md-3">
    <div class="profile-menu-left-side">
        <button class="btn btn-add-item  {{ $active=='add_item'?'active':'' }}"><i class="icon-file-add"></i>ADD NEW ITEM</button>
        <div class="profile-other-menu">
            <button class="btn btn-profile-menu {{ $active=='owned_item'?'active':'' }}">Owned Items</button>
            <button class="btn btn-profile-menu {{ $active=='request_item'?'active':'' }}">Borrow Requests</button>
            <button class="btn btn-profile-menu {{ $active=='lent_item'?'active':'' }}">Lent Items</button>
            <button class="btn btn-profile-menu {{ $active=='borrowed_item'?'active':'' }}">Borrowed Items</button>
        </div>
    </div>
</div>