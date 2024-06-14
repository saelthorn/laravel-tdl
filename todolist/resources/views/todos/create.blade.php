<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Create Todos</title>
</head>
<body>
    <div class="container">
        <h1>Create Todos</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{ route('todos.doing') }}">
            @csrf
            @method('post')
            <label for="todos">To do</label>
            <input type="text" name="todos" placeholder="to do" />
            <label for="done">Done</label>
            <input type="text" name="done" placeholder="done" />
            <label for="plans">Plans</label>
            <input type="text" name="plans" placeholder="plan" />
            <button type="submit" class="btn">Save a New To Do</button>
        </form>
    </div>
</body>
</html>
