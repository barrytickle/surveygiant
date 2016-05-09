@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach ($survey as $sur)
                <!-- Will send user responses to custom method "Response" -->
            {!! Form::open(array('action' => 'SurveyController@response', 'class' => 'login-box survey-box')) !!}
                <!-- Survey Introduction section -->
                <section class="survey-section section-active">
                    <h1>{{$sur->name}}</h1>
                    <h3>Author : {{$sur->user->name}}</h3>
                    <p>{{$sur->description}}</p>
                    <button type="button" class="btn js-btn-right">View Instructions</button>
                </section>
            <!-- Survey Instruction section -->
                <section class="survey-section">
                    <h1>Instructions</h1>
                    <p>This survey is designed to take you through one question at a time. This is designed so that you are not overwhelmed with the contents of the survey, to navigate through the survey please use the Next Back buttons to go through each question. </p>
                    <p>There may be 3 different types of questions throughout the survey, Long Answered Questions, Short Answered Questions and multiple choice Questions. More questions shall be added in the future.</p>
                    <p>Thank you for taking the time to participate in this survey.</p>
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Start Survey</button>
                </section>
        <!-- Will loop through all questions in survey -->
            @foreach($sur->question as $question)
                <section class="survey-section">
                    <h1>{{$question->QuestionName}}</h1>
                    <!-- Checks question type. -->
                    @if($question->QuestionType == 'Short')
                            <!-- sur[] is an array that will hold all the question ID's with the response as a $key => $value format -->
                        {!! Form::text('sur['.$question->id.']') !!}
                    @endif

                    @if($question->QuestionType == 'Radio')
                        <div class="row radio">
                            @foreach($question->choice as $choice)
                                {!! Form::radio('sur['.$question->id.']', $choice->ChoiceName, ['id' => $choice->ChoiceName.$question->id]) !!}
                                {!! Form::label($choice->ChoiceName.$question->id, $choice->ChoiceName) !!}
                            @endforeach
                        </div>
                    @endif
                    @if($question->QuestionType == 'Long')
                        {!! Form::textarea('sur['.$question->id.']') !!}
                    @endif
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Next</button>
                </section>
            @endforeach
                    <!-- End of survey submit form -->
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