@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Create a survey</h1>
        {!! Form::open(array('action' => 'SurveyController@store', 'class'=>'login-box')) !!}
        <section class="survey-section section-active">
            {!! Form::label('name', 'Survey Name:') !!}
            {!! Form::text('name', null) !!}
            {!! Form::label('description', 'Survey Description:') !!}
            {!! Form::textarea('description', null) !!}
            {!! Form::label('expire', 'How many days would you like this to be available for?:') !!}
            {!! Form::number('expire', null) !!}
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category[]', $cats, null) !!}
            {!! Form::submit('Create Survey', array('class' => 'btn btn-center')) !!}
        </section>
        {!! Form::close() !!}
    </div>
@endsection