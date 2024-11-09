@extends('layouts.app')
@section('title', 'Add a task')
@section('content')
@section('styles')
  <style>
    .error-message{
      color: red;
      font-size: 0.8rem;
    }
  </style>    
@endsection
    <form method="POST" action="{{route("tasks.create")}}">
        @csrf
        <div>
            <label for="title">
              Title
            </label>
            <input text="text" name="title" id="title" />
            @error('title')
                <p class="error-message"> {{$message}} </p>
            @enderror
          </div>
          <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
          </div>
          <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
          </div>
          <div>
            <button type="submit">Add Task</button>
          </div>
    </form>
@endsection