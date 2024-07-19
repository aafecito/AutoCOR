@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE VENTAS</h1>
@stop

@section('content')
    <h5>Añadir una venta</h5>
    <p>Aqui podrás añadir una nueva venta y prepararla para despachar</p>
    <div class="card">
        @php
            if (session()) {
                if (session('message') == 'ok') {
                    echo '
<x-adminlte-alert class="bg-lightblue text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
    Informacion envidada con exito!
</x-adminlte-alert>
';
                }
            }
        @endphp
        <div class="card-body">

            <form action="{{ route('showv', ['auto']) }}" method="POST">
                @csrf
                <div class="row row-cols-2">
                    <div class="col">
                        <x-adminlte-select name="opcionauto" label="Selecciona el vehiculo a vender"
                            label-class="text-lightblue" igroup-size="lg" id="opcionauto">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                            @endforeach

                        </x-adminlte-select>
                    </div>
                    <div class="col" style="display: flex; align-items:center">
                        <button type="submit" class="btn btn-success">Ver auto</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('venta.store') }}" method="POST">
                @csrf
                {{-- With prepend slot --}}
                <div class="row">
                    <div class="col-md-12">
                        <h5>Informacion del auto</h5>
                        <x-adminlte-input type="text" name="autop" label="PLACA" label-class="text-lightblue"
                            id="autop" placeholder="Aqui aparecerá la placa seleccionada">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <h4>Informacion del comprador</h4>
                <div class="row">
                    <div class="col-md-12">
                        <x-adminlte-input type="text" name="dni" label="CEDULA" placeholder="Ingrese la cedula"
                            label-class="text-lightblue" value="{{ old('dni') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="apellido" label="APELLIDOS" placeholder="Ingresar apellido"
                            label-class="text-lightblue" value="{{ old('apellido') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="nombre" label="NOMBRES" placeholder="Ingresar nombres"
                            label-class="text-lightblue" value="{{ old('nombre') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="correo" label="CORREO ELECTRONICO"
                            placeholder="ejemplo@example.com" label-class="text-lightblue" value="{{ old('correo') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="telefono" label="TELEFONO"
                            placeholder="Ingresar +593 987654321" label-class="text-lightblue"
                            value="{{ old('telefono') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{-- With prepend slot, sm size and label --}}
                        <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue"
                            igroup-size="sm" placeholder="Ingresar direccion completa y dos referencias">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-white">
                                    <i class="fas fa-lg fa fa-home text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{ old('direccion') }}
                        </x-adminlte-textarea>
                    </div>
                </div>

                <x-adminlte-button type="submit" label="Añadir venta" theme="primary" icon="fas fa-save" />
            </form>

        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        $(document).ready(function() {
            // Cuando cambia la opción seleccionada en el select
            $('#opcionauto').on('change', function() {
                // Obtener el valor del 'name' de la opción seleccionada
                var placaseleccionada = $(this).find(':selected').text();

                // Asignar el valor al input
                $('#autop').val(placaseleccionada);
            });
        });
    </script>
@stop
