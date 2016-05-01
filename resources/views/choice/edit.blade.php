@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit Choice - {{$choice->ChoiceName}}</h1>
        @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
        {{$choice->id}}
        {!! Form::model($choice, ['method' => 'PATCH', 'url' => 'choice/' . $choice->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('ChoiceName', 'Choice Text: ') !!}
        {!! Form::text('ChoiceName', null) !!}
        {!! Form::submit('Update Choice', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection