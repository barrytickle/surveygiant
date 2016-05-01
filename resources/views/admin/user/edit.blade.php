@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit User - {{$user->name}}</h1>
    </div>
    <div class="row">
        {!! Form::model($user, ['method' => 'PATCH', 'url' => 'admin/user/' . $user->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('name', 'Edit Name: ') !!}
        {!! Form::text('name', null) !!}
        {!! Form::label('email', 'Edit Email: ') !!}
        {!! Form::email('email', null) !!}
        {!! Form::submit('Update User', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection