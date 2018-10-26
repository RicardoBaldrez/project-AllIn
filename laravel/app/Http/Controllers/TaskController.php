<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
    public function edit($id){
        $idElement = Task::findOrFail($id)->id;
        $idName = Task::findOrFail($id)->name;
        $line = Task::findOrFail($id);
            
        return view('/edit-task', ['line' => $line, 'id' => $idElement, 'name' => $idName]);
    }
}