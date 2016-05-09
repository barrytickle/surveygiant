@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit Users</h1>
        <table>
            <thead>
            <tr>
                <th width="200">User Name</th>
                <th width="150">Email Address</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- loops through all users on index page. Showing their email and name. -->
            @foreach($user as $users)
            <tr>
                <td><a href="/admin/user/{{$users->id}}/">{{$users->name}}</a></td>
                <td>{{$users->email}}</td>
                <td><a href="/admin/user/{{$users->id}}/edit"><button type="button" class="btn">Edit</button></a></td>
                <!-- Form will link to the custom delete method in the user controller -->
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.user.destroy', $users->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn']) !!}
                    {!! Form::close() !!}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection