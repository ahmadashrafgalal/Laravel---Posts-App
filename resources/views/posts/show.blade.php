@extends('layouts.app')

@section('title') Show Post {{ $post['id'] }} @endsection

@section('content')
    <div class="card">
        <div class="card-header">
          Post Info
        </div>
        <div class="card-body">
          <h5 class="card-title">Title: {{ $post->title }}  {{ $post->user ? $post->user->name : "User Not Found" }}</h5>
          <p class="card-text">Description: {{ $post['description'] }}</p>
        </div>
    </div>
@endsection