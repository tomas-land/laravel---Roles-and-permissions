@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Role: </label>
            <input type="text" name="role" class="form-control">
            @error('role')
                <div class="alert ">{{ $message }}</div>
            @enderror
        </div>
        <label>Permissions: </label><br>
        @foreach ($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}"
                    id="{{ $permission->id }}">
                <label class="form-check-label" for="{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach
        @error('permission')
            <div class="alert ">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-5">Create</button>
    </form>

@endsection
