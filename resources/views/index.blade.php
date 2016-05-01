@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="card-section clearfix">
            @foreach($cats as $cat)
                <div class="card">
                    <div class="card-header"><h2>{{$cat->CategoryName}}</h2></div>
                    <div class="card-body">
                        <ul>
                            @foreach($cat->surveys as $survey)

                                @if($survey->published == 1)
                                    <li><a href="/survey/{{$survey->slug}}">{{$survey->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn"><a href="/category/{{$cat->CategoryName}}">View All</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection