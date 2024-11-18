@extends('layouts.app')
@section('title', $task->title)
@section('content')
    <p class="mb-2 text-zinc-800"> {{ $task->description }} </p>
    @isset($task->long_description)
        <p class="mb-2 text-zinc-700">{{ $task->long_description }}</p>
    @endisset
    <p class="mb-2 text-zinc-500"> Created: {{ $task->created_at->diffForHumans() }} • Edited:
        {{ $task->updated_at->diffForHumans() }} </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit the task</a>
        <form action="{{ route('tasks.complete', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class = "btn"> {{ $task->completed ? 'Mark as completed' : 'Mark as not completed' }}
            </button>
        </form>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>

    <div>
        <a href="{{ route('tasks.index') }}" class="link">← Go back</a>
    </div>
    </p>
@endsection
