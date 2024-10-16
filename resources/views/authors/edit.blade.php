@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">Edit Author</h1>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $author->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $author->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
