@extends('layouts.app')

@section('title', 'Bienvenido a D-Supplier')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new-product.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar nueva categoría</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/categories') }}">
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion de la categoría</label>
                        <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                    </div>
                <button class="btn btn-primary">Guardar categoría</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>

            </form>
        </div>
    </div>
</div>

@include('includes.footer')

@endsection
