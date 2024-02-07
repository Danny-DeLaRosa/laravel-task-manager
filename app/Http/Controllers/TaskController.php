<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{   
    // Define the 'index' method to handle requests to list all tasks
    public function index(Request $request)
    {
        // Fetch all tasks from the database using the Task model
        // Wrap the result in a TaskCollection resource for API response formatting
        // Return the TaskCollection, which might add additional JSON structure or metadata
        return new TaskCollection(Task::all());
    }
}
