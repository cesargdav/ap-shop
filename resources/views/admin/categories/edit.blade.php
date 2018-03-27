@extends('layouts.app')

@section('title', 'Bienvenido a D-Supplier')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new-product.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Editar categoría seleccionada</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
            @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion de la categoría</label>
                        <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                    </div>
                <button class="btn btn-primary">Guardar cambios</button>

                <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar cambios</a>

            </form>
        </div>
    </div>
</div>

@include('includes.footer')

@endsection
