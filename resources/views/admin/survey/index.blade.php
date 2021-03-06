@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>View Surveys</h1>
        <table>
            <thead>
            <tr>
                <th width="200">Survey Name</th>
                <th width="150">Survey Description</th>
                <th width="150">Category</th>
                <th width="150">Author</th>
                <th width="150">Start Date</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- due to the admin only being able to view and delete surveys, no edit has been created.
                 This will loop through the surveys giving the admin only the option to delete any surveys
                 that break the site rules
             -->
            @foreach($survey as $surveys)
                <tr>
                    <td>{{$surveys->name}}</td>
                    <td>{{$surveys->description}}</td>
                    @foreach($surveys->category as $category)
                        <td><a href="/admin/category/{{$category->id}}">{{$category->CategoryName}}</a></td>
                    @endforeach
                    <td><a href="/admin/user/{{$surveys->user->id}}">{{$surveys->user->name}}</a></td>
                    <td>{{$surveys->created_at}}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.survey.destroy', $surveys->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection