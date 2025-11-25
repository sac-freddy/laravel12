@extends('layouts.plantilla')

@section('title', 'Editar')

@section('content')

    <h1>En esta pagina se podra editar la cotizacion</h1>

    <div class="contenedor-grid">
        <div class="seccion seccion6">
            <div class="form-group row">
                <label class="col-sm-6 col-form-label" for="preorden_nombre" style="font-weight: bolder;">Nombre</label>
                <div class="">
                    <label class="col-sm-6 col-form-label text-right">cccc</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label" for="preorden_nombre" style="font-weight: bolder;">Marca</label>
                <div class="">
                    <label class="col-sm-6 col-form-label text-right">ddd</label>
                </div>
            </div>
        </div>
        <div class="seccion seccion6">
            <div class="form-group row">
                <label class="col-sm-6 col-form-label" for="preorden_nombre" style="font-weight: bolder;">Nombre</label>
                <div class="">
                    <label class="col-sm-6 col-form-label text-right">ssss</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-6 col-form-label" for="preorden_nombre" style="font-weight: bolder;">Marca</label>
                <div class="">
                    <label class="col-sm-6 col-form-label text-right">sssss</label>
                </div>
            </div>
        </div>

        <div class="seccion seccion12">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nro</th>
                        <th>Articulo</th>
                        <th>Precio (Unid)</th>
                        <th>Cantidad</th>
                        <th>Articulo</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <form action="{{ route('actualizarCotizacion', $cotizacion) }}" method="POST">

        @csrf
        @method('put')

        <label>
            Nombre
            <br>
            <input type="text" name="nombre" value="{{ old('nombre', $cotizacion->nombre) }}">
        </label>
        @error('nombre')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror
        <input type="hidden" name="slug" value="slug">


        <br>
        <br>
        <label>
            Descripcion
            <br>
            <textarea type="text" name="descripcion" rows="5">{{ old('descripcion', $cotizacion->descripcion) }}</textarea>
        </label>
        @error('descripcion')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror


        <br>
        <br>
        <label>
            Categoria
            <br>
            <input type="text" name="categoria" value="{{ old('categoria', $cotizacion->categoria) }}">
        </label>
        @error('categoria')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror


        <br>
        <br>
        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('listarCotizaciones') }}">Regresar</a>
@endsection
