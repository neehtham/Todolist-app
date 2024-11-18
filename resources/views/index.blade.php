@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    <nav class="mb-4">
        <a href="{{route('tasks.create')}}" 
        class="font-lg text-gray-500 font-semibold hover:text-gray-700" >Add a task</a>
    </nav>
    @forelse ($tasks as $task)
        <ol>
            <li class="list-disc">
            <a @class(['mb-2 text-semibold text-zinc-600 hover:text-zinc-800', 'line-through' => $task->completed])
            href="{{ route('tasks.show', ['task' => $task->id]) }}"> {{$task->title}}</a></li>
        </ol>
    @empty 
        <h1> There are no tasks </h1>
    @endforelse
    @if ($tasks->count())
    <nav>
      {{ $tasks->links() }}
    </nav>
  @endif
@endsection
