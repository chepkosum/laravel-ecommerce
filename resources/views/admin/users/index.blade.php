@extends('layouts.admin')


@section('title', 'Users List')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary text-white  btn-sm  float-end  ">Add
                            User</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_as == '0')
                                            <label class="badge btn-primary ">User</label>
                                        @elseif($user->role_as == '1')
                                            <label class="badge btn-success ">Admin</label>
                                        @else
                                            <label class="badge btn-danger">None</label>
                                        @endif
                                    <td>
                                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ url('admin/users/' . $user->id . '/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Users available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
