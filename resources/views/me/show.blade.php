@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Your Surveys</h1>
        @foreach($surveys as $survey)
            <div class="card card-large">
                <div class="card-header"><h2>{{$survey->name}}</h2></div>
                <div class="card-body">
                    <ul>
                        @foreach ($survey->category as $cat)
                        <li>Category: {{$cat->CategoryName}}</li>
                        @endforeach
                        <li>Published:
                            @if($survey->published < 1)
                                No
                            @else
                                Yes
                            @endif
                        </li>
                        <li>Days left: {{$survey->expire}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row btn-center">
                        <button class="btn "><a href="/survey/{{$survey->slug}}">View</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn"><a href="/survey/{{$survey->slug}}/edit">Edit Survey</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn btn-center"><a href="/me/survey/{{$survey->slug}}/questions/edit">Edit Questions</a></button>
                    </div>
                    <div class="row btn-center">
                         <button class="btn"><a href="/survey/{{$survey->slug}}/edit">Responses</a></button>
                    </div>
                    <div class="row btn-center">
                        <a href="/survey/{{$survey->slug}}/delete"><button class="btn ">Delete</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection