@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Add Choice</h1>
    </div>
    <!-- makes a form to create a choice for each question, will hide the question id so that the choice can redirect to the question choice->
    {!! Form::open(array('action'=> 'ChoiceController@store', 'class' => 'login-box')) !!}
    {!! Form::hidden('id', $question->id) !!}
    {!! Form::label('ChoiceName', 'Enter Choice:') !!}
    {!! Form::text('ChoiceName', null) !!}
    {!! Form::submit('Add Choice', array('class'=> 'btn')) !!}
    {!! Form::close() !!}
@endsection