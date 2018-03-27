<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        //$request -> all();
        $messages=[
            'name.required' => 'Es necesario ingresar un nombre para la categoría.',
            'name.min' => 'El nombre de la categoría debe tener al menos 5 caracteres.',
            'description.min' => 'La descripcion debe tener al menos 50 caracteres'
        ];

        $rules=[
            'name' => 'required|min:5',
            'description' => 'max:50'
        ];

        $this -> validate($request, $rules, $messages);

        Category::create($request->all()); //Asignacion masiva


        return redirect('/admin/categories');
    }

    public function edit(Category $category){
        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category){
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para la categoría',
            'name.min' => 'El nombre de la categoría debe tener al menos 5 caracteres',
            'description.max' => 'La descripcion debe tener al menos 50 caracteres'
        ];
        $rules = [
            'name' => 'required|min:5',
            'description' => 'max:250'
        ];

        $this->validate($request, $rules, $messages);
        $category->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}