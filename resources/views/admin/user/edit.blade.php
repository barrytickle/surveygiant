@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit User - {{$user->name}}</h1>
    </div>
    <div class="row">
        <!-- Will grab all data from the db related to this user and will display it in the form.
            Form is linked to the custom update method.
        -->
        {!! Form::model($user, ['method' => 'PATCH', 'url' => 'admin/user/' . $user->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('name', 'Edit Name: ') !!}
        {!! Form::text('name', null) !!}
        {!! Form::label('email', 'Edit Email: ') !!}
        {!! Form::email('email', null) !!}
        {!! Form::submit('Update User', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection