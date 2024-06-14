<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>Edit Todos</title>
</head>
<body>
    <div class="container">
        <h1>Edit Todos</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{ route('todos.update', ['todo' => $todos->id]) }}">
            @csrf
            @method('put')
            <div>
                <label for="todos">To dos</label>
                <input type="text" name="todos" placeholder="to do" value="{{ $todos->todos }}" />
            </div>
            <div>
                <label for="done">Done</label>
                <input type="text" name="done" placeholder="done" value="{{ $todos->done }}" />
            </div>
            <div>
                <label for="plans">Plans</label>
                <input type="text" name="plans" placeholder="plan" value="{{ $todos->plans }}" />
            </div>
            <div>
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
