@extends('layouts.master')
@section('content')

    <div class="row">
        <!-- Finds question name dynamically -->
        <h1>Edit Question - {{$question->QuestionName}}</h1>
        @if ($errors->any())
            <div>
                <!-- Will load any errors to the site-->
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
                <!-- Will trigger the update method on submit -->
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