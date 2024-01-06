<?php



@extends('layouts.app') <!-- Assuming you have a layout file, adjust accordingly -->

@section('content')
    <h2>Rate a Book</h2>

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="book_id">Select a Book:</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach ($books as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rating">Rate the Book (1-10):</label>
            <select name="rating" id="rating" class="form-control">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Rating</button>
    </form>
@endsection
