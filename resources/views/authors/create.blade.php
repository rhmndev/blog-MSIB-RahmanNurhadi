@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">Add Author</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
