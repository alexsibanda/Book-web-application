<!-- resources/views/books/index.blade.php -->

@extends('layouts.app') 

@section('content')
    <h2>List of Books</h2>

    <form action="{{ route('books.index') }}" method="GET">
        <div class="form-group">
            <label for="filter">Number of Books to Display:</label>
            <select name="filter" id="filter" class="form-control">
                @for ($i = 10; $i <= 100; $i += 10)
                    <option value="{{ $i }}" {{ $filter == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="search">Search by Title:</label>
            <input type="text" name="search" id="search" class="form-control" value="{{ $search }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Average Rating</th>
                <th>Voter Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->calculateAverageRating() }}</td>
                    <td>{{ $book->getVoterCount() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection
