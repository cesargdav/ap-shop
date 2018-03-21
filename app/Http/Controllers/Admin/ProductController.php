<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request){
        //$request -> all();
        $messages=[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 5 caracteres.',
            'description.required' => 'El producto debe llevar una descripcion corta',
            'description.min' => 'La descripcion debe tener al menos 50 caracteres',
            'long_description.required' => 'Es necesario ingresar una descripcion.',
            'long_description.min' => 'La descripcion extensa debe tener por lo menos 200 caracteres.',
            'price.required' => 'El precio no puede ir vacio.',
            'price.min' => 'El precio no puede tener valores negativos.'
        ];

        $rules=[
            'name' => 'required|min:5',
            'description' => 'required|min:50',
            'long_description' => 'required|min:200',
            'price' => 'required|numeric|min:0'
        ];
        $this -> validate($request, $rules, $messages);


        $product = new Product();
        $product -> name = $request -> input('name');
        $product -> description = $request -> input('description');
        $product -> price = $request -> input('price');
        $product -> long_description = $request -> input('long_description');
        $product -> save();

        return redirect('/admin/products');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id){
        $messages=[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 5 caracteres.',
            'description.required' => 'El producto debe llevar una descripcion corta',
            'description.min' => 'La descripcion debe tener al menos 50 caracteres',
            'long_description.required' => 'Es necesario ingresar una descripcion.',
            'long_description.min' => 'La descripcion extensa debe tener por lo menos 200 caracteres.',
            'price.required' => 'El precio no puede ir vacio.',
            'price.min' => 'El precio no puede tener valores negativos.'
        ];

        $rules=[
            'name' => 'required|min:5',
            'description' => 'required|min:50',
            'long_description' => 'required|min:200',
            'price' => 'required|numeric|min:0'
        ];
        $this -> validate($request, $rules, $messages);

        
        $product = Product::find($id);
        $product -> name = $request -> input('name');
        $product -> description = $request -> input('description');
        $product -> price = $request -> input('price');
        $product -> long_description = $request -> input('long_description');
        $product -> save();

        return redirect('/admin/products');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product -> delete();

        return back();
    }
}
