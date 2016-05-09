@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>Edit Roles</h1>
        <div class="row">
            <a href="/admin/role/create"><button type="button" class="btn">Add New Role</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Role Name</th>
                <th width="150">Role Label</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- will loop through all roles, giving the admin the ability to edit and delete. Showing only the name and label
                in tabular format
            -->
            @foreach($role as $roles)
                <tr>
                    <td><a href="/admin/role/{{$roles->id}}/">{{$roles->name}}</a></td>
                    <td>{{$roles->label}}</td>
                    <td><a href="/admin/role/{{$roles->id}}/edit"><button type="button" class="btn">Edit</button></a></td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.role.destroy', $roles->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection