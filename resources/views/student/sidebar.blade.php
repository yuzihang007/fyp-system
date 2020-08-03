<div class="list-group">
    <a class="list-group-item text-center bg-light ">Welcome {{ auth()->user()->name }}</a>
    <a href="{{url('student/titleIndex')}}" class="list-group-item text-center {{Request::getPathInfo()=='/student/titleIndex'?'active':''}}">Topics</a>
    <a href="{{url('title/create')}}" class="list-group-item text-center {{Request::getPathInfo()=='/title/create'?'active':''}}"></a>
    <a href="{{url('time_allocate/index')}}" class="list-group-item text-center {{Request::getPathInfo()=='/time_allocate/index'?'active':''}}">Application Managemeng</a>
    <a class="list-group-item text-center bg-light "></a>
    <a href="" class="list-group-item text-center "></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center"></a>
    <a href="" class="list-group-item text-center">P</a>
</div>
