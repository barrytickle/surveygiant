@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="card-section clearfix">
            <!-- loops through category array -->
            @foreach($cats as $cat)
                <div class="card">
                    <!-- loads category name in card header -->
                    <div class="card-header"><h2>{{$cat->CategoryName}}</h2></div>
                    <div class="card-body">
                        <ul>
                            <!-- will loop through surveys in that category and grab survey names-->
                            @foreach($cat->surveys as $survey)

                                @if($survey->published == 1)
                                    <li><a href="/survey/{{$survey->slug}}">{{$survey->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <!-- will give the option to view all with dynamic link to category show method -->
                        <button class="btn"><a href="/category/{{$cat->CategoryName}}">View All</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection