@extends('layouts.master')
@section('content')
    <div class="row">
        <h1>{{$roles->name}} - Users</h1>
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
                @foreach($roles->user as $user)
                    @foreach($user->role as $role)
                        @if($role->id == $roles->id)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td><a href="/admin/users/{{$user->id}}/edit"><button type="button" class="btn">Edit</button></a></td>
                            <td>{!! Form::open(['method' => 'DELETE', 'route' => ['admin.role.destroy', $role->id]]) !!}
                                {!! Form::submit('Delete Role', ['class' => 'btn']) !!}
                                {!! Form::close() !!}</td>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection