<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {
        
    }

    public function recoveringTask($id)
    {
        $idElement = Task::findOrFail($id)->id;
        $idName = Task::findOrFail($id)->name;
        $line = Task::findOrFail($id);
            
        return view('/edit-task', ['line' => $line, 'id' => $idElement, 'name' => $idName]);
    }

    public function editNameTask(Request $request)
    {
        $form = $request->all();
        $task = Task::findOrFail($form['id']);
        $task->name = $form['nameChange'];

        // var_dump($form);
        // var_dump($task);
        // var_dump($task->name = $form['nameChange']);

        $task->save();

        return redirect('/');
    }

    public function deleteTask($id) 
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}

