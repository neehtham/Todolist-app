@extends('layouts.app')
@section('title', 'Add a task')
@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection
@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-4">
            <label for="title">
                Title
            </label>
            <input text="text" name="title" id="title" value="{{ old('title') }}" @class(['border-red-500' => $errors->has('title')]) />
            @error('title')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Add Task</button>
            <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
