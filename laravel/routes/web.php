<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::get('/', function () {

    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks,
    ]);
});

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});

/**
 * Change An Existing Task
 */
Route::get('/task/{id}', 'TaskController@edit');

Route::patch('/task/edit', function(Request $request) {
    $form = $request->all();
    $task = Task::findOrFail($form['id']);
    $task->name = $form['nameChange'];

    var_dump($form);
    var_dump($task);
    var_dump($task->name = $form['nameChange']);

    die();

    $task->save();

    return redirect('/');
});