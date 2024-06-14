<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>To do List</h1>
    <div class="success">
        @if(@session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div class="container">
        <div>
            <button class="btn" onclick="window.location='{{ route('todos.create') }}'">Create Todos</button>
        </div>
        <table border="1">
            <tr>
                <th>Todos</th>
                <th>Plans</th>
                <th>Done</th>
                <th style="width: 40px">Edit</th>
                <th style="width: 50px">Delete</th>
            </tr>
            @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->todos}}</td>
                    <td>{{$todo->plans}}</td>
                    <td>{{$todo->done}}</td>
                    <td>
                        <a href="{{route('todos.edit', ['todo' => $todo])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('todos.destroy', ['todo' => $todo]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>