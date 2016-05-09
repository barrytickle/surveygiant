@extends('layouts.master')
@section('content')
    <div class="row">
        <!-- loops through each category -->
        @foreach($category as $cat)
            <h1>Category: {{$cat->CategoryName}}</h1>
        <div class="card-section clearfix">
            <!-- will display all surveys that link to that category, if no surveys are available an empty message will display -->
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
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="/survey/{{$survey->slug}}"><button class="btn">View Survey</button></a>
                        </div>
                    </div>
                    @endif
                @endforeach
        @endforeach
        </div>
    </div>
@endsection