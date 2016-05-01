@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach ($survey as $sur)
            {!! Form::open(array('action' => 'SurveyController@response', 'class' => 'login-box')) !!}
            <section class="survey-section section-active">
                <h1>{{$sur->name}}</h1>
                <h3>Author : {{$sur->user->name}}</h3>
                <p>{{$sur->description}}</p>
                <button type="button" class="btn js-btn-right">Start Survey</button>
            </section>
            @foreach($sur->question as $question)
                <section class="survey-section">
                    <h1>{{$question->QuestionName}}</h1>
                    <h2>Responses</h2>
                    @foreach($question->response as $response)
                        <li>{{$response->ResponseName}}</li>
                    @endforeach
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Next</button>
                </section>

            @endforeach
            <section class="survey-section">
                <h1>End of Survey</h1>
                <button type="button" class="btn js-btn-left">Back</button>
            </section>

            {!! Form::close() !!}
        @endforeach
    </div>
@endsection