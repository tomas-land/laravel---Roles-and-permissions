@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Name: </label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <div class="alert ">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="text" name="email" class="form-control">
            @error('email')
                <div class="alert ">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="text" name="password" class="form-control">
            @error('password')
                <div class="alert ">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Choose role: </label>
            <select name="role" id="" class="form-control">
                <option value="" selected disabled>Choose..</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
                <div class="alert ">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
