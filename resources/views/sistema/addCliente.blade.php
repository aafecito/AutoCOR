@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Ingrese la informacion de los nuevos clientes</p>
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
            <form action="{{ route('cliente.store') }}" method="POST">
                @csrf
                {{-- With prepend slot --}}

                <x-adminlte-input type="text" name="dni" label="CEDULA" placeholder="Ingrese la cedula"
                    label-class="text-lightblue" value="{{ old('dni') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="apellido" label="APELLIDOS" placeholder="Ingresar apellido"
                    label-class="text-lightblue" value="{{ old('apellido') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="nombre" label="NOMBRES" placeholder="Ingresar nombres"
                    label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="email" name="correo" label="CORREO ELECTRONICO" placeholder="ejemplo@example.com"
                    label-class="text-lightblue" value="{{ old('correo') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="Ingresar +593987654321"
                    label-class="text-lightblue" value="{{ old('telefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-primary" igroup-size="sm"
                    placeholder="Ingresar direccion completa y dos referencias">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-home text-primary"></i>
                        </div>
                    </x-slot>
                    {{ old('direccion') }}
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
    <script>
        console.log('Hi!');
    </script>
@stop
