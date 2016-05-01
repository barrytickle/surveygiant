@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>{{$roles}} - Users</h1>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th width="200">User Name</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    @foreach($role->user as $user)
                        <td>{{$user}}</td>
                    @endforeach
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection