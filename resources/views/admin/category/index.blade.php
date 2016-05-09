@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit Categories</h1>
        <div class="row">
            <a href="/admin/category/create"><button type="button" class="btn">Add New Category</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Category Name</th>
                <th width="150">Category Description</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- will loop through each category and provide details on all categories currently in the db -->
            @foreach($category as $cats)
                <tr>
                    <td><a href="/admin/category/{{$cats->id}}/">{{$cats->CategoryName}}</a></td>
                    <td>{{$cats->CategoryDescription}}</td>
                    <td><a href="/admin/category/{{$cats->id}}/edit"><button type="button" class="btn">Edit</button></a></td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', $cats->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection