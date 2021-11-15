@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
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
            <th>Title</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                    <div class="row">
                        @can('edit post')
                            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        @endcan
                        @can('delete post')
                            <form action={{ route('posts.destroy', $post->id) }} method="POST">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-danger" value=""><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
    </table>





@endsection
