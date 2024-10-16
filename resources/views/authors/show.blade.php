@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">{{ $author->name }}</h1>
    <p><strong>ID:</strong> {{ $author->id }}</p>
    <p><strong>Email:</strong> {{ $author->email }}</p>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back to Authors</a>
</div>
@endsection
