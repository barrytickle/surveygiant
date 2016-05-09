@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Create a survey</h1>
        <!-- Form will store survey into db -->
        {!! Form::open(array('action' => 'SurveyController@store', 'class'=>'login-box')) !!}
        <section class="survey-section section-active">
            <!-- Survey Name-->
            {!! Form::label('name', 'Survey Name:') !!}
            {!! Form::text('name', null) !!}
            <!-- Survey Description -->
            {!! Form::label('description', 'Survey Description:') !!}
            {!! Form::textarea('description', null) !!}
            <!-- Survey Expire -->
            {!! Form::label('expire', 'How many days would you like this to be available for?:') !!}
            {!! Form::number('expire', null) !!}
             <!-- Survey category drop down list -->
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category[]', $cats, null) !!}
            <!-- Submit survey form -->
            {!! Form::submit('Create Survey', array('class' => 'btn btn-center')) !!}
        </section>
        {!! Form::close() !!}
    </div>
@endsection