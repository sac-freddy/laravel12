@extends('layouts.plantilla')

@section('title', 'Cotizaciones')



@section('content')

<div class="container">
    <br>
    <h2>Lista de Cotizaciones</h2>
    <br>
    <a href="{{route('crearCotizacion')}}" class="btn btn-primary">Crear Nueva Cotizacion</a>
    <br>
    <br>
    <div class="table-responsive">
    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Realizado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->id }}</td>
                    <td>{{ $cotizacion->fecha }}</td>
                    <td>{{ $cotizacion->cliente_id }}</td>
                    <td>{{ $cotizacion->total }}</td>
                    <td>{{ $cotizacion->estado_id }}</td>
                   
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('editarCotizacion', $cotizacion) }}" class="btn btn-warning mr-3">Editar</a>
                            
                            <a href="{{ route('eliminarCotizacion', $cotizacion) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('eliminar-form').submit();">Eliminar</a>
                            <form id="eliminar-form" action="{{ route('eliminarCotizacion', $cotizacion) }}" method="POST" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table></div>
</div>
     
@endsection
 