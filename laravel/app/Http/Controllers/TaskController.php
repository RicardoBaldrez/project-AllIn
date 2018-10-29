<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    /**
     * Display All Tasks
     */
    public function displayTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Add A New Task
     */
    public function addTask(Request $request)
    {
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
    }

    /**
     * Recover Task
     */
    public function recoveringTask($id)
    {
        $idElement = Task::findOrFail($id)->id;
        $idName = Task::findOrFail($id)->name;
        $line = Task::findOrFail($id);
            
        return view('/edit-task', ['line' => $line, 'id' => $idElement, 'name' => $idName]);
    }

    /**
     * Change Task
     */
    public function editNameTask(Request $request)
    {   
        $form = $request->all();
        $task = Task::findOrFail($form['id']);
        $task->name = $form['nameChange'];

        var_dump($form);
        var_dump($task);
        var_dump($task->name = $form['nameChange']);

        $task->save();

        return redirect('/');
    }

    /**
     * Delete Task
     */
    public function deleteTask($id) 
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}

