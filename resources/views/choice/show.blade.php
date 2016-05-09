@extends('layouts.master')
@section('content')
        <!-- Data will be presented as a table -->
    <div class="row">
        <h1>Choice List - {{$question->QuestionName}}</h1>
    </div>
    <div class="row">
        <div class="row">
            <a href="/choice/{{$question->id}}/create"><button type="button" class="btn">Add new Choice</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Choice</th>
                <th width="200">Edit</th>
                <th width="200">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- Loops through choices. -->
            @foreach($question->choice as $choice)
                <tr>
                    <td>{{$choice->ChoiceName}}</td>
                    <td><a href="/choice/{{$choice->id}}/edit"><button class="btn" type="button">Edit</button></a></td>
                    <td>
                        <!-- links to custom delete method-->
                        {!! Form::open(['method' => 'DELETE', 'route' => ['choice.destroy', $choice->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection