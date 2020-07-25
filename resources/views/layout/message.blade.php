
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">success</span>
    </button>
    <strong>success</strong>{{Session::get('success')}}
</div>
@endif


@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">success</span>
    </button>
    <strong>failure</strong>{{Session::get('error')}}
</div>
@endif
