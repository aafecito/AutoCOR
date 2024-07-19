@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Ingrese la informacion de los nuevos clientes</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}

                <x-adminlte-input type="text" name="dni" label="CEDULA" label-class="text-lightblue"
                    value="{{ $cliente->dni }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="apellido" label="APELLIDOS" label-class="text-lightblue"
                    value="{{ $cliente->apellido }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="nombre" label="NOMBRES" label-class="text-lightblue"
                    value="{{ $cliente->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="email" name="correo" label="CORREO ELECTRONICO" label-class="text-lightblue"
                    value="{{ $cliente->correo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="telefono" label="TELEFONO" label-class="text-lightblue"
                    value="{{ $cliente->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-primary" igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-home text-primary"></i>
                        </div>
                    </x-slot>
                    {{ $cliente->direccion }}
                </x-adminlte-textarea>

                <x-adminlte-button type="submit" label="Enviar" theme="primary" icon="fas fa-save" />
            </form>
        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Mensaje',
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif
@stop
