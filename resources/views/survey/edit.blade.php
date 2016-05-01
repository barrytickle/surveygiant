@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit - {{ $survey->name }}</h1>
        {!! Form::model($survey, ['method' => 'PATCH', 'url' => 'survey/' . $survey->id, 'class' => 'login-box']) !!}
        <section class="survey-section section-active">
            {!! Form::label('name', 'Survey Name:') !!}
            {!! Form::text('name', null) !!}
            {!! Form::label('description', 'Survey Description:') !!}
            {!! Form::textarea('description', null) !!}
            {!! Form::label('expire', 'How many days would you like this to be available for?:') !!}
            {!! Form::number('expire', null) !!}
            {!! Form::label('category', 'Category:') !!}
            @foreach($survey->category as $cat)
                {!! Form::select('category[]', $cats,$cat->id ) !!}
            @endforeach
            {!! Form::label('publish', 'Publish Survey?') !!}
            @if($survey->published == 1)
                {!! Form::checkbox('publish', 'Publish', true) !!}
            @else
                {!! Form::checkbox('publish', 'Publish') !!}
            @endif
            {!! Form::submit('Update Survey', ['class' => 'btn']) !!}
        </section>
        {!! Form::close() !!}
    </div>
@endsection