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
Route::get('/', 'TaskController@displayTasks');

/**
 * Add A New Task
 */
Route::post('/task', 'TaskController@addTask');

/**
 * Delete Task
 */
Route::delete('/task/{id}', 'TaskController@deleteTask');

/**
 * Recover Task
 */
Route::get('/task/{id}', 'TaskController@recoveringTask');

/**
 * Change Task
 */
Route::patch('/task/edit', 'TaskController@editNameTask');