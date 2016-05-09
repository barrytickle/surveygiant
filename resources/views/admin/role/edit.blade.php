@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit user {{$role->name}}</h1>
    </div>
    <div class="row">
        <!-- Allows the admin to edit a role, and change the details while being able to update this in the database. -->
        {!! Form::model($role, ['method' => 'PATCH', 'url' => 'admin/role/' . $role->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('name', 'Edit Role Name:') !!}
        {!! Form::text('name', null) !!}
        {!! Form::label('label', 'Edit Role Label:') !!}
        {!! Form::text('label', null) !!}
        {!! Form::submit('Update Role', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection