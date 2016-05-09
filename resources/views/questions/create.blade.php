@extends('layouts.master')
@section('extra-nav')
@endsection
@section('content')
    <div class="row">
        <h1>Add Question</h1>
    </div>
    <!-- Store question method linked-->
    {!! Form::open(array('action'=> 'QuestionController@store', 'class' => 'login-box')) !!}
            <!-- will have two hidden fields, survey id and the survey slug, this is so it can be attached in the pivot table
            and redirect back to surveys-->
    @foreach($survey as $sur)
        {!! Form::hidden('slug', $sur->slug) !!}
        {!! Form::hidden('id', $sur->id) !!}
    @endforeach

            <!-- form for entering questions -->
        {!! Form::label('QuestionName', 'Enter Question Title') !!}
        {!! Form::text('QuestionName', null) !!}
        {!! Form::label('QuestionType', 'Select Question Type:')!!}
                <!-- Select box with three possible choices for question type -->
        {!! Form::select('QuestionType', [
           'Short' => 'Short',
           'Long' =>  'Long',
           'Radio' => 'Radio'], null, ['id' => 'QuestionType']
        ) !!}
        {!! Form::submit('Add Question', array('class'=> 'btn', 'id' => 'QuestionSub')) !!}
    {!! Form::close() !!}
@endsection