@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>{{$category->CategoryName}} - Surveys</h1>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th width="200">Survey Name</th>
                <th width="150">Author Name</th>
                <th width="150">Created at</th>
                <th width="150">Days Left</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- Will loop through surveys and will display all surveys related to this category --> 
            @foreach($survey as $surveys)
                @foreach($surveys->category as $cat)
                    @if($cat->id == $category->id)
                        <tr>
                            <td>{!! $surveys->name !!}</td>
                            <td><a href="/admin/user/{{$surveys->user->id}}">{!! $surveys->user->name !!}</a></td>
                            <td>{!! $surveys->created_at !!}</td>
                            <td>{!! $surveys->expire !!}</td>
                            <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.survey.destroy', $surveys->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn']) !!}
                                {!! Form::close() !!}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection