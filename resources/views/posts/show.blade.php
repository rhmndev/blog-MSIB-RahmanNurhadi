@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">{{ $post->title }}</h1>
    <p><strong>ID:</strong> {{ $post->id }}</p>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Author:</strong> {{ $post->author->name }}</p>
    <p><strong>Status:</strong> {{ $post->is_published ? 'Published' : 'Draft' }}</p>
    <div>
        <strong>Content:</strong>
        <p>{{ $post->content }}</p>
    </div>
    @if($post->image)
        <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid mb-3">
    @endif
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
