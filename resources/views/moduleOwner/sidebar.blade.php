<div class="list-group">
    <a class="list-group-item text-center bg-light ">Wlecome {{ auth()->user()->name }}</a>
    <a href="{{url('moduleOwner/vettingList')}}" class="list-group-item text-center
    {{Request::getPathInfo()=='/moduleOwner/vettingList'?'active':''}}">Topic Vetting</a>
    <a href="{{url('title/create')}}" class="list-group-item text-center
    {{Request::getPathInfo()=='/title/create'?'active':''}}"></a>

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


