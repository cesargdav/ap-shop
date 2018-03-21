@extends('layouts.app')

@section('title', 'Bienvenido a D-Supplier')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new-product.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar nuevo producto</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/products') }}">
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                        </div>
                    </div>
                </div>                

                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion corta del producto</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                    </div>


                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion extensa del producto</label>
                        <textarea class="form-control" rows="5" name="long_description">{{ old('long_description') }}</textarea>
                    </div>
                <button class="btn btn-primary">Guardar producto</button>

            </form>
        </div>
    </div>
</div>

@include('includes.footer')

@endsection
