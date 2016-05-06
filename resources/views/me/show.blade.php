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
                        {{--<li>Days left: {{$survey->expire}}</li>--}}
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row btn-center">
                        <button class="btn "><a href="/survey/{{$survey->slug}}">View Survey</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn"><a href="/survey/{{$survey->id}}/edit">Edit Survey</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn btn-center"><a href="/question/{{$survey->slug}}">Questions</a></button>
                    </div>
                    <div class="row btn-center">
                         <button class="btn"><a href="/responses/{{$survey->slug}}">View Responses</a></button>
                    </div>
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