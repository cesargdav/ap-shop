@extends('layouts.app')

@section('title', 'Imágenes de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Imágenes de producto "{{ $product->name }}"</h2>

            <form method="POST" action="" enctype="multipart/form-data">
            @csrf
                <input type="file" name="photo" required>
                <button class="btn btn-primary btn-round">
                    <i class="material-icons">add_circle</i> Subir nueva imagen de producto
                </button>
                <a href="{{ url('/admin/products') }}" class="btn btn-defualt btn-round">
                    <i class="fa fa-reply"></i>&nbsp Volver a listado de productos
                </a>
            </form>

            <hr>
            
            <div class="row">
                @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-deafult">
                        <div class="panel-body">
                            <img src="{{ $image->url }}" alt="Imagen del producto" width="250px" height="200px">
                            <form method="POST" action="">
                            @csrf
                            @method('DELETE')
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <button type="submit" rel="tooltip" title="Eliminar imagen" class="btn btn-danger btn-round fa-3x">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @if($image->featured)
                                <button type="button" rel="tooltip" title="Imagen destacada del producto" class="btn btn-warning btn-round fa-3x">
                                    <i class="fa fa-star"></i>
                                </button>
                                @else
                                    <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" rel="tooltip" title="Destacar imagen" class="fa-3x btn btn-primary btn-round">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://demonsystem.com/">
                        Demon Tech
                    </a>
                </li>
                <li>
                    <a href="#">
                        Sobre nosotros
                    </a>
                </li>
                <li>
                    <a href="#">
                        Términos y condiciones
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2018, by Demon Tech
        </div>
    </div>
</footer>
@endsection
