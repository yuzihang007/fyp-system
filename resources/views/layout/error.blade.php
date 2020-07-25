
@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>
{{--            <li>topic id is not null</li>--}}
{{--            <li>project title is not null</li>--}}
{{--            <li>type of suitable for is not null</li>--}}
{{--            <li>description is not null</li>--}}
            @endforeach
        </ul>
    </div>
@endif


