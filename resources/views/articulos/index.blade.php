@extends('layouts.plantilla')

@section('title', 'Articulos')



@section('content')

    <div id="vueArticulo" class="contenedor-grid">
        <div class="seccion seccion12">
            <br>
            <h2>Lista de Articulos</h2>
            <br>
            {{-- <a href="{{ route('crearCotizacion') }}" class="btn btn-primary">Crear Nueva Cotizacion</a> --}}
            <br>
            <br>
            <div class="table-responsive">



                <h2>con json</h2>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripcion</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cotizacion in listaArticulos" :key="cotizacion.id">
                            <td>@{{ cotizacion.id }}</td>
                            <td>@{{ cotizacion.descripcion }}</td>
                            <td>@{{ cotizacion.marca_id }}</td>
                            <td>@{{ cotizacion.precioventa }}</td>
                            <td>@{{ cotizacion.estado }}</td>
                            <td>
                                <a :href="'cotizaciones/editar/' + cotizacion.id" class="btn btn-warning mr-3" target="_blank">Editar</a>

                                <a class="btn btn-danger">Eliminar</a>
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

        window.moduloActivo = "{{ $moduloActivo }}"; // "index", "crear", "editar"
    </script>


@endsection
