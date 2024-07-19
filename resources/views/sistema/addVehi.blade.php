@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE VEHICULOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion del nuevo vehiculo</p>
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
            <form action="{{ route('vehiculo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- With prepend slot --}}
                <h5>INFORMACION DE RECONOCIMIENTO</h5>
                <div class="row">
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="placa" label="PLACA" placeholder="Ingrese la placa"
                            label-class="text-lightblue" value="{{ old('placa') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="nchasis" label="NUMERO DE CHASIS"
                            placeholder="Ingresar numero de chasis" label-class="text-lightblue"
                            value="{{ old('nchasis') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="nmotor" label="NUMERO DE MOTOR"
                            placeholder="Ingresar numero de motor" label-class="text-lightblue" value="{{ old('nmotor') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <H5>MARCA Y MODELO</H5>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="marca" label="MARCA" placeholder="Ingrese la marca"
                            label-class="text-lightblue" value="{{ old('marca') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-car text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input type="text" name="modelo" label="MODELO" placeholder="Ingrese el modelo"
                            label-class="text-lightblue" value="{{ old('modelo') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-car text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <H5>TIPO DE VEHICULO</H5>
                <div class="row">
                    <div class="col-md-12">
                        <x-adminlte-input type="text" name="tipo" label="TIPO DE VEHICULO"
                            placeholder="Ingrese el tipo de vehiculo (Liviano, SUV, 4x4, clasico)"
                            label-class="text-lightblue" value="{{ old('tipo') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-car text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <H5>DATOS NUMERICOS IMPORTANTES</H5>
                <div class="row">
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="kilometraje" label="KILOMETRAJE"
                            placeholder="Ingrese el numero de kilometros recorridos" label-class="text-lightblue"
                            value="{{ old('kilometraje') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-road text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="precio" label="PRECIO" placeholder="Ingrese el precio"
                            label-class="text-lightblue" value="{{ old('precio') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-dollar-sign text-lightblue" aria-hidden="true"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input type="text" name="año" label="AÑO DE FABRICACION"
                            placeholder="Ingresar el año de fabricacion" label-class="text-lightblue"
                            value="{{ old('año') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                {{-- With prepend slot, sm size and label --}}
                <H5>DETALLES GENERALES DEL VEHICULO</H5>
                <x-adminlte-textarea name="details1" label="DETALLES TECNICOS" rows=5 label-class="text-lightblue"
                    igroup-size="sm" placeholder="Ingresar los detalles técnicos del vehiculo">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa fa-wrench text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{ old('details1') }}
                </x-adminlte-textarea>

                <x-adminlte-textarea name="details2" label="DETALLES VISUALES" rows=5 label-class="text-lightblue"
                    igroup-size="sm" placeholder="Ingresar los detalles visuales del vehiculo">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa fa-wrench text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{ old('details2') }}
                </x-adminlte-textarea>

                <x-adminlte-textarea name="details3" label="DETALLES DE USO" rows=5 label-class="text-lightblue"
                    igroup-size="sm"
                    placeholder="Ingresar detalles especiales del vehiculo debido al uso en caso de existir alguno">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-lg fa fa-wrench text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{ old('details3') }}
                </x-adminlte-textarea>

                <H5>IMAGEN DEL VEHICULO</H5>
                {{-- <input type="file" class="form-control" name="img" placeholder="Imagen"> --}}
                <x-adminlte-input-file type="file" class="form-control" name="img" label="Upload file"
                    label-class="text-lightblue" placeholder="Elegir imagen..." />
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
