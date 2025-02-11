@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-success" >Create Post</a>
    </div>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['description'] }}</td>
                    <td>{{ $post['created_at'] }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post['id'] ) }}" class="btn btn-info">View</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                        <form style="display: inline" method="POST" action="{{ route('posts.destroy', $post['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection