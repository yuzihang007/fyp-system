<div class="list-group">
    <a class="list-group-item text-center bg-light ">Wlecome {{ auth()->user()->name }}</a>
    <a href="{{url('title/index')}}" class="list-group-item text-center {{Request::getPathInfo()=='/title/index'?'active':''}}">Viva</a>
    <a href="{{url('title/create')}}" class="list-group-item text-center {{Request::getPathInfo()=='/title/create'?'active':''}}">Viva arrange</a>
    <a href="{{url('/moduleOwner/time_allocate/index')}}" class="list-group-item text-center {{Request::getPathInfo()=='/moduleOwner/time_allocate/index'?'active':''}}">Application Managemeng</a>

    <a class="list-group-item text-center bg-light "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center "></a>

</div>


