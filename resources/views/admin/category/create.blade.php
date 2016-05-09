@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Create Category</h1>
    </div>
    <!-- allows the category to be created by the admin. -->
    {!! Form::open(array('action'=> 'AdminCategoryController@store', 'class' => 'login-box')) !!}
    {!! Form::label('CategoryName', 'Enter Category Name:') !!}
    {!! Form::text('CategoryName', null) !!}
    {!! Form::label('CategoryDescription', 'Enter Category Description:') !!}
    {!! Form::text('CategoryDescription', null) !!}
    {!! Form::submit('Add Category', array('class'=> 'btn')) !!}
    {!! Form::close() !!}
@endsection