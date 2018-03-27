@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/new.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de categorías</h2>

            <div class="team">
                <div class="row">

                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">add_circle</i> Nuevo categoría
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripcion</th>
                                <th class="col-md-4 text-center">Imagen</th>
                                <th class="col-md-5 text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td><img src="{{ $category->featured_image_url }}" height="50" alt=""></td>
                                <td class="td-actions text-right">                                    
                                    <form method="POST" action="{{ url('/admin/categories/'.$category->id)}}">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{ url('/categories/'.$category->id) }}" target="_blank" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar categoría" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
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
