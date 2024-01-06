<?php 

<!-- resources/views/authors/top.blade.php -->

@extends('layouts.app') 

@section('content')
    <h2>Top 10 Authors</h2>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Author</th>
                <th>Number of Books</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->books_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No authors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
