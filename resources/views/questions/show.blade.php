@extends('layouts.master')
@section('content')
<div class="row">
    <h1>Survey Questions</h1>
</div>
<div class="row">
    <!-- loops through all surveys-->
    @foreach($survey as $surveys)
            <!-- gives the user the chance to add a question -->
        <div class="row">
            <a href="/question/{{$surveys->slug}}/create"><button type="button" class="btn">Add new Question</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Question</th>
                <th width="200">Type</th>
                <th width="200">Edit</th>
                <th width="200">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- will loop through all questions for the selected survey. -->
        @foreach($surveys->question as $question)
                <tr>
                    <!-- allows the user to go to a seperate link to add choices to question -->
                    @if($question->QuestionType == 'Radio')
                        <td><a href="/choice/{{$question->id}}">{{$question->QuestionName}}</a></td>
                    @else
                    <td>{{$question->QuestionName}}</td>
                    @endif
                    <td>{{$question->QuestionType}}</td>
                    <td><a href="/question/{{$question->id}}/edit"><button class="btn" type="button">Edit</button></a></td>
                    <!-- will trigger the destroy method in the question controller. -->
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    @endforeach


</div>


@endsection