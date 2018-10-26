<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- CSS And JavaScript -->
    </head>

    <body>
        <form action="/task/edit" method="POST" class="form-horizontal">
            {{ csrf_field()}}
            
            <h2 style="margin: 20px">Name exchange:</h2>

            <!-- Task Name -->
            <div class="col-sm-2">
                <input type="text" name="nameChange" class="form-control">
            </div>

            <div class="form-group">
                <div class="">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Change Task
                    </button>
                </div>
            </div>

            <input type='hidden' name='id' value='{{$id}}'/>
        </form> 

        <h4 style="margin: 20px">Linha recuperada do id {{$id}}</h4>
        <h4 style="margin: 20px">Name recuperado do id <b style="color:orangered">{{$name}}</b></h4>
        <h4 style="margin: 20px"</p>{{$line}}</h4>
    </body>
</html>