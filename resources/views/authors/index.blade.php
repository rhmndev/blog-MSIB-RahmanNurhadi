@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h4 mb-4">Authors</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td class="text-center">{{ $author->id }}</td>
                    <td class="text-center">{{ $author->name }}</td>
                    <td class="text-center">{{ $author->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info me-2" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning me-2" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $authors->links() }}
</div>
@endsection
