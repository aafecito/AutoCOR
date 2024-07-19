@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Editar la informacion de un vehiculo</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('vehiculo.update', $vehiculo) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}

                <x-adminlte-input type="text" name="placa" label="PLACA" label-class="text-lightblue"
                    value="{{ $vehiculo->placa }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="nchasis" label="NUMERO DE CHASIS" label-class="text-lightblue"
                    value="{{ $vehiculo->nchasis }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="nmotor" label="NUMERO DE MOTOR" label-class="text-lightblue"
                    value="{{ $vehiculo->nmotor }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="marca" label="MARCA" label-class="text-lightblue"
                    value="{{ $vehiculo->marca }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="modelo" label="MODELO" label-class="text-lightblue"
                    value="{{ $vehiculo->modelo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="tipo" label="TIPO" label-class="text-lightblue"
                    value="{{ $vehiculo->tipo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="kilometraje" label="KILOMETRAJE" label-class="text-lightblue"
                    value="{{ $vehiculo->kilometraje }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="precio" label="PRECIO" label-class="text-lightblue"
                    value="{{ $vehiculo->precio }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="año" label="AÑO" label-class="text-lightblue"
                    value="{{ $vehiculo->año }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="details1" label="DESCRIPCION TECNICA" rows=5 label-class="text-primary"
                    igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-home text-primary"></i>
                        </div>
                    </x-slot>
                    {{ $vehiculo->details1 }}
                </x-adminlte-textarea>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="details2" label="DESCRIPCION VISUAL" rows=5 label-class="text-primary"
                    igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-home text-primary"></i>
                        </div>
                    </x-slot>
                    {{ $vehiculo->details2 }}
                </x-adminlte-textarea>

                {{-- With prepend slot, sm size and label --}}
                <x-adminlte-textarea name="details3" label="DETALLES" rows=5 label-class="text-primary" igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-home text-primary"></i>
                        </div>
                    </x-slot>
                    {{ $vehiculo->details3 }}
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
