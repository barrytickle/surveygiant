@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Add Choice</h1>
    </div>
    {!! Form::open(array('action'=> 'ChoiceController@store', 'class' => 'login-box')) !!}
    {!! Form::hidden('id', $question->id) !!}
    {!! Form::label('ChoiceName', 'Enter Choice:') !!}
    {!! Form::text('ChoiceName', null) !!}
    {!! Form::submit('Add Choice', array('class'=> 'btn')) !!}
    {!! Form::close() !!}
@endsection