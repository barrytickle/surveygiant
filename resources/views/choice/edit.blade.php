@extends('layouts.master')
@section('content')
    <div class="row">
        <!-- will Dynamically use choice name-->
        <h1>Edit Choice - {{$choice->ChoiceName}}</h1>
        <!-- will check for any errors -->
        @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
        <!-- will link through to the update method, using the choice id as the update id -->
        {!! Form::model($choice, ['method' => 'PATCH', 'url' => 'choice/' . $choice->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('ChoiceName', 'Choice Text: ') !!}
        {!! Form::text('ChoiceName', null) !!}
        {!! Form::submit('Update Choice', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection