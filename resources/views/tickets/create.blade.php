@extends('layouts.app')

@section('content')
    <h1>Add Tickets</h1>

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

       
        <button type="submit">Add Tikect</button>
    </form>
@endsection