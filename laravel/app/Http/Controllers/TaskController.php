<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
    public function edit($id){
        $idElement = Task::findOrFail($id)->id;
        $line = Task::findOrFail($id);
        return view('edit-task', ['line' => $line, 'id' => $idElement]);
    }
}
