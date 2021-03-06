@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-btn fa-list"></i>Lista de Posts
                </div>

                <div class="panel-body">
                    <a href="{{ route('post.create') }}" class="btn btn-success">
                        <i class="fa fa-btn fa-plus"></i>Nuevo
                    </a>
                    <hr/>
                    {!! Form::open(['route' => 'post.index', 'method' => 'GET']) !!}
                    <div class="input-group">
                        {!! Form::text('buscar_post', null, ['placeholder' => 'Buscar post por código o título...', 'class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </span>
                    </div>
                    {!! Form::close() !!}
                    <hr/>
                    <table class="table table-hover">
                        <tr class="table-header">
                            <th>Codigo</th>
                            <th>Titulo</th>
                            <th>¿Publicado?</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Creación</th>
                            <th>Ultima modificación</th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr class="table-body">
                            <td>{{ $post->codigo }}</td>
                            <td>{{ $post->titulo }}</td>
                            <td>
                                @if($post->publicado)
                                Si
                                @else
                                No
                                @endif
                            </td>
                            <td>{{ $post->categoria->nombre }}</td>
                            <td>
                                @if($post->imagen != null && $post->imagen != '')
                                <img src="{{ route('post.imagen', ['nombreImagen' => $post->imagen]) }}" alt="" width="100"/>
                                @else
                                Sin imagen
                                @endif
                            </td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('post.edit', $post->codigo) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('post.show', $post->codigo) }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ route('post.reporte', $post->codigo) }}" class="btn btn-info">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="panel-footer text-center">
                    {{ $posts->render() }}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
