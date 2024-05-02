<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    // store para guardar un todo
    public function store(Request $request)
    {
        // metodo para validar los campos que se estan recibiendo
        $request->validate([ //si esto no se cumple va a mandar un error
            'title' => 'required|min:3'
        ]);

        $todo = new Todo();

        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'tarea creada correctamente');
    }
    // show
    public function show($id)
    {
        $todo = Todo::with('category')->find($id);
        $categories = Category::all();
        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);
    }

    // index para mostrar todos los elementos
    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', compact('todos', 'categories'));
    }
    // update para actualizar un todo
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title =  $request->title;
        //recibir categoria y guardarla
        $category = Category::find($request->category_id);
        if($category){
            $todo->category_id = $category->id;
        }
        $todo->save();

        return redirect()->route('todos')->with('success', 'Actualizado correctamente');
    }
    // destroy para eliminar un todo
    public function destroy($id)
    {
        $post = Todo::find($id);
        $post->delete();
        return redirect()->route('todos')->with('success', 'tarea eliminada');
    }
    // edit para mostrar el formulario de edicion

}
