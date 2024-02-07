<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned safely
    protected $fillable = [
        'title', // Allow 'title' to be filled through mass assignment
        'is_done', // Allow 'is_done' to be filled through mass assignment
    ]; 
        // Define how certain attributes should be cast when fetched from or stored in the database
    protected $casts = [
        // Cast the 'is_done' attribute as a boolean value (true/false)
        'is_done' => 'boolean'
    ];
    // Specify attributes that should not be visible when the model is converted to an array or JSON
    protected $hidden = [
        // Hide the 'updated_at' attribute to not show when this task was last updated
        'updatated_at',
    ];
}
