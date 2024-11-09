<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index', ['tasks' => Task::where('completed', false)->get()]);
})->name('tasks.index');

Route::view('/create', 'create');

Route::get('/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::get('/{id}/edit', function ($id) {
    return view('edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('edit');

Route::post('/', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'task created successfully');
})->name('tasks.create');

Route::put('/tasks/{id}', function ($id, Request $request) {
    // Validate incoming data
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    // Find the task by ID or return a 404 error if not found
    $task = Task::findOrFail($id);

    // Update task properties
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    // Save the task and check if successful
    if ($task->save()) {
        return redirect()->route('tasks.show', ['id' => $task->id])
            ->with('success', 'Task updated successfully!');
    } else {
        return back()->withErrors(['error' => 'Failed to update the task. Please try again.']);
    }
})->name('tasks.update');

require __DIR__ . '/auth.php';
