@extends('layouts.master')
@section('extra-nav')
@endsection
@section('content')
    <div class="row">
        <h1>Add Question</h1>
    </div>
    {!! Form::open(array('action'=> 'QuestionController@store', 'class' => 'login-box')) !!}
    @foreach($survey as $sur)
        {!! Form::hidden('slug', $sur->slug) !!}
        {!! Form::hidden('id', $sur->id) !!}
    @endforeach
        {!! Form::label('QuestionName', 'Enter Question Title') !!}
        {!! Form::text('QuestionName', null) !!}
        {!! Form::label('QuestionType', 'Select Question Type:')!!}
        {!! Form::select('QuestionType', [
           'Short' => 'Short',
           'Long' =>  'Long',
           'Radio' => 'Radio'], null, ['id' => 'QuestionType']
        ) !!}
        {!! Form::submit('Add Question', array('class'=> 'btn', 'id' => 'QuestionSub')) !!}
    {!! Form::close() !!}
@endsection