
<div class="list-group">
    <a class="list-group-item text-center bg-light ">Wlecome {{ auth()->user()->name }}</a>
    <a href="{{url('/title/index')}}" class="list-group-item text-center {{Request::getPathInfo()=='/title/index'?'active':''}}">title list</a>
    <a href="{{url('title/create')}}" class="list-group-item text-center {{Request::getPathInfo()=='/title/create'?'active':''}}">title create</a>
    <a class="list-group-item text-center bg-light ">-</a>
    <a href="{{url('/application/index')}}" class="list-group-item text-center ">Student Application</a>
    <a href="{{url('/supervisor/time_allocate/index')}}" class="list-group-item text-center {{Request::getPathInfo()=='/supervisor/time_allocate/index'?'active':''}}">Application Managemeng</a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
</div>
