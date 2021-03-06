@extends('layouts.app')

@section('title', 'Bienvenido a D-Supplier')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new-product.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Editar producto seleccionado</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
            @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripcion corta del producto</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description', $product->description) }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Categoría del producto</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="0">General</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion extensa del producto</label>
                        <textarea class="form-control" rows="5" name="long_description">{{ old('long_description', $product->long_description) }}</textarea>
                    </div>
                <button class="btn btn-primary">Guardar cambios</button>

                <a href="{{ url('/admin/products') }}" class="btn btn-danger">Cancelar cambios</a>

            </form>
        </div>
    </div>
</div>

@include('includes.footer')

@endsection
