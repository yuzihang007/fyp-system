<div class="list-group">
    <a class="list-group-item text-center bg-light ">Wlecome {{ auth()->user()->name }}</a>
    <a href="{{url('admin/userList')}}" class="list-group-item text-center {{Request::getPathInfo()=='/admin/userList'?'active':''}}">User List</a>
    <a href="{{url('admin/createUser')}}" class="list-group-item text-center {{Request::getPathInfo()=='/admin/createUser'?'active':''}}">Create New User</a>
    <a class="list-group-item text-center bg-light "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
</div>


