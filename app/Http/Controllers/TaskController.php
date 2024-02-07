<?php

namespace App\Http\Controllers;

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
}
