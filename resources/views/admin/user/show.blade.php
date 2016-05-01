@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>{{$user->name}} - Surveys</h1>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th width="200">Survey Name</th>
                    <th width="150">Survey Category</th>
                    <th width="150">Created at</th>
                    <th width="150">Days Left</th>
                    <th width="150">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($survey as $surveys)
                    <tr>
                        <td>{{ $surveys->name }}</td>
                        @foreach($surveys->category as $category)
                        <td><a href="/admin/category/{{$category->id}}">{{ $category->CategoryName }}</a></td>
                        @endforeach
                        <td>{{ $surveys->created_at }}</td>
                        <td>{{ $surveys->expire }}</td>
                        <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.survey.destroy', $surveys->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection