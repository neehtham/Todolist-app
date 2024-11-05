@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    @forelse ($tasks as $task)
        <div> <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> {{$task->title}} </div>
    @empty 
        <h1> There are no tasks </h1>
    @endforelse
@endsection
