@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit user {{$category->name}}</h1>
    </div>
    <div class="row">
        <!-- allows the category to be updated, the form will link to the update method in the admin category controller -->
        {!! Form::model($category, ['method' => 'PATCH', 'url' => 'admin/category/' . $category->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('CategoryName', 'Edit Category Name:') !!}
        {!! Form::text('CategoryName', null) !!}
        {!! Form::label('CategoryDescription', 'Edit Category Description:') !!}
        {!! Form::text('CategoryDescription', null) !!}
        {!! Form::submit('Update Category', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection