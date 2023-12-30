<div class="border-end bg-white h-100" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a href="#">
            <h2>Admin <span>Panel</span></h2>
        </a>
    </div>
    <div class="list-group-flush">

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.dashboard') }}">
            Dashboard</a>
        {{-- admin.user.list.view --}}
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.user.list.view') }}">
            User Listing</a>
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.gift.list') }}">
            Gift Listing</a>
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.user.messages.list') }}">
            User Messages</a>

    </div>
</div>
