# Laravel for REST API

## Start new laravel project

You will need to set up a new Laravel project using the following commands in your terminal:

        $ composer create-project laravel/laravel <project_name>
        $ cd <project_name>
        $ composer require --dev barryvdh/laravel-ide-helper --with-all-dependencies
        $ code .
        $ php artisan serve

Navigate to [localhost:8000](http://localhost:8000)

## Create a first Route

create a model with a controller and a migration

    $ cd <project_name>
    $ php artisan make:model Task -cm

Fill in the migration

navigate to migration folder

    database/migrations/2024_02_07_184919_create_tasks_table.php

Open up the newly created migration file now for tasks we are going to require a title which is going to be a string value and a is done value which is going to be a Boolean and we will default this to false

       public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title of the task added
            $table->boolean('is_done')->default(false); // Is task done boolean value added
            $table->timestamps();
        });
    }

Use sqlite in ENV file

    DB_CONNECTION=sqlite //changed from mysql to sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=

now run a php artisan migrate

    $ php artisan migrate
    $ yes

Navigate to Task controller 

    app/Http/Controllers/TaskController.php

Add action that returns all tasks in the database

        class TaskController extends Controller
    {
    public function index(Request $request)
        {
        return response()->json(Task::all());
        }
    }

Navigate to api.php route

    routes/api.php

Connect a route to the task controller

        Route::get('tasks', [TaskController::class, 'index']);

Navigate to [localhost:8000/api/tasks](http://localhost:8000/api/tasks)

you should see an empty array

    []

run the artisan tinker and manually create a new task.

    $ php artisan tinker
    $ $task = new Task()
    $ $task->title = 'Do my homework'
    $ task->save()

## Model Resources

create resources for the tasks

    $ php artisan make:reource TaskResource
    $ php artisan make:reource TaskCollection

Navigate to TaskController

    app/Http/Controllers/TaskController.php

return a new task collection with tasks we created

    public function index(Request $request)
    {
    return new TaskCollection(Task::all());
    }

navigate to local:host8000 

    {"data":[{"id":1,"title":"Do my homework please","is_done":0,"created_at":"2024-02-07T18:59:48.000000Z","updated_at":"2024-02-07T18:59:48.000000Z"}]}

navigate to TaskResource 

    app/Http/Resources/TaskResource.php

change layout of code

    public function toArray(Request $request): array
    {
        $data =parent::toArray($request);
        $data['status'] =$this->is_done ? 'finished' : 'open';
        return $data;
    }

navigate to local:host8000 

    {"data":[{"id":1,"title":"Do my homework please","is_done": 0,"created_at":"2024-02-07T18:59:48.000000Z","updated_at":"2024-02-07T18:59:48.000000Z","status":"open"}]}

