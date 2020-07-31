@extends('layout.main')
@include('layout.error')
@include('layout.message')



@section('sidebar')
    @include('moduleOwner.sidebar')
@stop

@section('content')
    <form role="search" class="bd-search d-flex align-items-center">
      <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;">
        <input type="search" class="form-control ds-input" name="title" id="search-input" value="{{request()->input('title')}}" placeholder="Search..." aria-label="Search for..." autocomplete="off" data-docs-version="4.5" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top;">
        <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
        <span class="ds-dropdown-menu" role="listbox" id="algolia-autocomplete-listbox-0" style="position: absolute; top: 100%; z-index: 100; display: none; left: 0px; right: auto;">
          <div class="ds-dataset-1"></div>
        </span>
      </span>
            <button class="btn bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false">
                    <title>Menu</title>
                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
            </button>
    </form>

    <div class="panel-body" style="padding: 10px 0px;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{route('module.pass.vetting')}}">Passed Topic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('module.wait.vetting')}}">Waiting for vetting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('module.refuse.vetting')}}">waiting for adjusting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled active" href="#" tabindex="-1" aria-disabled="true">All Titles</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">List of project title</div>
        <table class="table table-light table-striped table-hover">
            <thead>
            <tr>
                <th>Topic ID</th>
                <th>Title</th>
                <th>Suitable For</th>
                <th>Keywords</th>
                <th>Supervisor's Name</th>
                <th>Vetting Status</th>
                <th>Operation</th>
            </tr>
            </thead>


            @foreach($list as $title)
                <tr>
                    <th scope="row">{{$title->topic_id}}{{$title->id}}</th>
                    <td ><a href="{{url('title/detail',$title->id)}}">{{$title->project_title}}</a></td>
                    <td>
                        @foreach($title->suitable_for as $suitable_for)
                            <li>{{$suitable_for}}</li>
                        @endforeach
                    </td>
                    <td>{{$title->keywords}}</td>
                    <td>{{$title->full_name}}</td>
                    <th>{{$title->audit_status}}</th>
                    <td>
                        @if($title->status==0)
                            <button type="button"  class="btn btn-info btn-default post-audit"
                                    post-id="{{$title->id}}" post-action-status="1">Pass</button>
                            <button type="button" class="btn btn-info btn-danger post-audit"
                                    post-id="{{$title->id}}" post-action-status="-1">Fail</button>
                        @elseif($title->status==1)
                            <button type="button" class="btn btn-info btn-danger post-audit"
                                    post-id="{{$title->id}}" post-action-status="-1">Fail</button>
                        @elseif($title->status==-1)
                            <button type="button"  class="btn btn-info btn-default post-audit"
                                    post-id="{{$title->id}}" post-action-status="1">Pass</button>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>


    <!--fen ye-->
    <div class="pagination justify-content-end">
        {{$list->render()}}

    </div>
@stop

