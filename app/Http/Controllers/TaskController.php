<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Define the 'index' method to handle requests to list all tasks
    public function index(Request $request)
    {
        // Fetch all tasks from the database using the Task model
        // Wrap the result in a TaskCollection resource for API response formatting
        return new TaskCollection(Task::all());
    }
    // Define a new 'show' method to handle requests for a single task
    public function show(Request $request, Task $task)
    {
        // Wrap the provided task in a TaskResource for API response formatting
        // Return the TaskResource, allowing for potential customization of the task's JSON representation
        return new TaskResource($task);
    }
    // New method to store (create) a task
    public function store(StoreTaskRequest $request)
    {
        // Validate the incoming request data using the StoreTaskRequest rules
        $validated = $request->validated();

        // Create a new task with the validated data
        $task = Task::create(
            $validated
        );
        // Return the newly created task, wrapped in a resource for consistent formatting
        return new TaskResource($task);
    }
    // Method to update an existing task
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Validate the request and update the task
        $validated = $request->validated();
        $task->update($validated);
        // Return the updated task as a resource
        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return response()->noContent(); 
    }
}
//PEST Tests for TaskController