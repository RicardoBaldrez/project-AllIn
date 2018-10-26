@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->
    <!-- New Task Form -->
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field()}}

        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
    </form>
    
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasksnte
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div> 
                                        <span style="font-weight: bold">id:</span> {{$task->id}}, 
                                        <span style="font-weight: bold">name:</span> {{$task->name}}, 
                                        <span style="font-weight: bold">created in:</span> {{$task->created_at}} ...
                                        <span style="font-weight: bold">update in:</span> {{$task->updated_at}}
                                    </div>
                                </td>
                                <!-- Change Button -->
                                <td>
                                    <form action="/task/{{$task->id}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('GET')}}
                                        <button class="btn btn-default">Change Task</button>
                                    </form>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <form action="/task/{{$task->id}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection