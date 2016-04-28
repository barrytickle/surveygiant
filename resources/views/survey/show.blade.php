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
                    @if($question->QuestionType == 'Open')
                        {!! Form::text('sur['.$question->id.']','test') !!}
                    @endif
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Next</button>
                </section>
            @endforeach
            <section class="survey-section">
                <h1>End of survey</h1>
                <p>Thank you for finishing this survey, press submit to send.</p>
                <button type="button" class="btn js-btn-left">Back</button>
                {!! Form::submit('Submit Survey', array('class' => 'btn'))!!}
            </section>

            {!! Form::close() !!}
        @endforeach


    </div>
@endsection