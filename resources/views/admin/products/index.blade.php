@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de productos</h2>

            <div class="team">
                <div class="row">

                    <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">add_circle</i> Nuevo producto
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripcion</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                                <td class="text-right">&euro; {{ $product->price }}</td>
                                <td class="td-actions text-right">                                    
                                    <form method="POST" action="{{ url('/admin/products/'.$product->id)}}">
                                        <a rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                                            <i class="fa fa-image"></i>
                                        </a>
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
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
