@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Your Surveys</h1>

        @foreach($surveys as $survey)
            <div class="card card-large">
                <div class="card-header"><h2>{{$survey->name}}</h2></div>
                <div class="card-body">
                    <ul>
                        <!-- Will display the survey category and if the survey is published in the card body -->
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
                    </ul>
                </div>
                <!-- Options for each survey:
                    - View
                    - Edit
                    - Questions
                    - Responses
                    - Submit
                 -->
                <div class="card-footer">
                    <div class="row btn-center">
                        <a href="/survey/{{$survey->slug}}"><button class="btn">View Survey</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/survey/{{$survey->id}}/edit"> <button class="btn">Edit Survey</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/question/{{$survey->slug}}"><button class="btn btn-center">Questions</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/responses/{{$survey->slug}}"><button class="btn">View Responses/button></a><
                    </div>
                    <!-- wwill link to custom destroy method-->
                    <div class="row btn-center">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['survey.destroy', $survey->id]])!!}
                        {!! Form::submit('Delete Survey', ['class' => 'btn']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection