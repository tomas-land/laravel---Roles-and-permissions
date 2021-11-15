@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Roles Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Role</th>
            <th>Permissions</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @foreach ($role->permissions as $permission)
                        <label class="badge badge-success">{{ $permission->name }}</label>
                    @endforeach
                </td>
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> --}}
                    <form action={{ route('roles.destroy', $role->id) }} method="POST">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger" value=""><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
