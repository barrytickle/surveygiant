@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Create Category</h1>
    </div>
    <!-- Allows the admin to crate a role and store it in the role controller method -->
    {!! Form::open(array('action'=> 'RoleController@store', 'class' => 'login-box')) !!}
    {!! Form::label('name', 'Enter Role Name:') !!}
    {!! Form::text('name', null) !!}
    {!! Form::label('label', 'Enter Role Label:') !!}
    {!! Form::text('label', null) !!}
    {!! Form::submit('Add Role', array('class'=> 'btn')) !!}
    {!! Form::close() !!}
@endsection