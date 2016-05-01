@extends('layouts.master')
@section('content')

    <div class="row">
        <h1>Edit Question - {{$question->QuestionName}}</h1>
        @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
        {!! Form::model($question, ['method' => 'PATCH', 'url' => 'question/' . $question->id, 'class' => 'login-box'] ) !!}
        {!! Form::hidden('id', $question->id) !!}
        {!! Form::label('QuestionName', 'Question Name: ') !!}
        {!! Form::text('QuestionName', null) !!}
        {!! Form::label('QuestionType', 'Select Question Type:')!!}
        {!! Form::select('QuestionType', [
           'Short' => 'Short',
           'Long' =>  'Long',
           'Radio' => 'Radio'], null, ['id' => 'QuestionType']
        ) !!}
        {!! Form::submit('Update Question', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection