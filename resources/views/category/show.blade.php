@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach($category as $cat)
            <h1>Category: {{$cat->CategoryName}}</h1>
        <div class="card-section clearfix">
                @foreach($cat->surveys as $survey)
                     @if(!$survey)
                         <h4>Sorry, no surveys are available yet. Be the first to create one for this category!</h4>
                     @endif
                     @if($survey->published == 1)
                    <div class="card">
                        <div class="card-header"><h2>{{$survey->name}}</h2></div>
                        <div class="card-body">
                            <ul>
                                <li>Author: {{$survey->user->name}}</li>
                                <li>Created: {{$survey->created_at}}</li>
                                {{--<li>Days Left: {{$survey->expire}}</li>--}}
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn"><a href="/survey/{{$survey->slug}}">View Survey</a></button>
                        </div>
                    </div>
                    @endif
                @endforeach
        @endforeach
        </div>
    </div>
@endsection