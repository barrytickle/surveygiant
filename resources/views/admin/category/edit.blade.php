@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit user {{$category->name}}</h1>
    </div>
    <div class="row">
        {!! Form::model($category, ['method' => 'PATCH', 'url' => 'admin/category/' . $category->id, 'class' => 'login-box'] ) !!}
        {!! Form::label('CategoryName', 'Edit Category Name:') !!}
        {!! Form::text('CategoryName', null) !!}
        {!! Form::label('CategoryDescription', 'Edit Category Description:') !!}
        {!! Form::text('CategoryDescription', null) !!}
        {!! Form::submit('Update Category', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
@endsection