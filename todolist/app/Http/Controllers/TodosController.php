<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodosController extends Controller
{
    public function index() {
        $todos = Todos::all(); 
        return view('todos.index', ['todos'=> $todos]);
    }

    public function create() {
        return view('todos.create');
    }

    public function doing(Request $request) {
        $data = $request->validate([
            'todos' => 'required',
            'done' => 'required', 
            'plans' => 'required'
        ]);

        $newTodos = Todos::create($data);

        return redirect(route('todos.index'));

    }

    public function edit(Todos $todo) {
        return view('todos.edit', ['todos'=> $todo]);
    }

    public function update(Todos $todo, Request $request) {
        $data = $request->validate([
            'todos' => 'required',
            'done' => 'required', 
            'plans' => 'required'
        ]);

        $todo->update($data);

        return redirect(route('todos.index'))->with('success', 'Todo Updated Successfully');
    }

    public function destroy(Todos $todo) {
        $todo->delete();
        
        return redirect(route('todos.index'))->with('success', 'Todo Deleted Successfully');
    }
}
