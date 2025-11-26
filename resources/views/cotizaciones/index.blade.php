@extends('layouts.plantilla')

@section('title', 'Cotizaciones')



@section('content')

    <div id="vueCotizacion" class="contenedor-grid">
        <div class="seccion seccion12">
            <br>
            <h2>Lista de Cotizaciones</h2>
            <br>
            <a href="{{ route('crearCotizacion') }}" class="btn btn-primary">Crear Nueva Cotizacion</a>
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
                                <td>Vendedor</td>

                                <td>
                                    <a href="{{ route('editarCotizacion', $cotizacion) }}"
                                        class="btn btn-warning mr-3">Editar</a>

                                    <a href="{{ route('eliminarCotizacion', $cotizacion) }}" class="btn btn-danger"
                                        onclick="event.preventDefault(); document.getElementById('eliminar-form').submit();">Eliminar</a>
                                    <form id="eliminar-form" action="{{ route('eliminarCotizacion', $cotizacion) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
                <h2>con json</h2>
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
                        <tr v-for="cotizacion in listaCotizaciones" :key="cotizacion.id">
                            <td>@{{ cotizacion.id }}</td>
                            <td>@{{ cotizacion.fecha }}</td>
                            <td>@{{ cotizacion.nombre_cliente }}</td>
                            <td>@{{ cotizacion.total }}</td>
                            <td>@{{ cotizacion.estado_id }}</td>
                            <td>Vendedor</td>
                            <td>
                                {{-- <a :href="`/cotizaciones/editar/${cotizacion.id}`" class="btn btn-warning mr-3">Editar</a>

                <button @click="eliminarCotizacion(cotizacion.id)" class="btn btn-danger">
                    Eliminar
                </button> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <!-- Cargar Loader -->
        <div id="loader-overlay" class="loader-overlay" style="display: none;">
            <div class="orbit-wrapper">
                <img :src="urlPublicImg + 'logo3.png'" alt="Cargando..." class="loader-icon">
                <div class="orbit orbit-1"></div>
                <div class="orbit orbit-2"></div>
            </div>
        </div>
    </div>




    <script>
        window.Laravel = {
            baseUrl: "{{ url('/') }}"
        };

        window.moduloActivo = "{{ $moduloActivo }}"; // "index", "crear", "editar", etc.
    </script>


@endsection
