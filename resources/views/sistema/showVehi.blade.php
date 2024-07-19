@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>VISUALIZACION DEL VEHICULO</h1>
@stop

@section('content')
    <p>Informacion sobre el vehiculo seleccionado</p>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                {{-- With prepend slot --}}

                <x-adminlte-card title="PLACA" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->placa }}
                </x-adminlte-card>

                <x-adminlte-card title="NUMERO DE CHASIS" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->nchasis }}
                </x-adminlte-card>

                <x-adminlte-card title="NUMERO DE MOTOR" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->nmotor }}
                </x-adminlte-card>

                <x-adminlte-card title="MARCA" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->marca }}
                </x-adminlte-card>

                <x-adminlte-card title="MODELO" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->modelo }}
                </x-adminlte-card>

                <x-adminlte-card title="TIPO" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->tipo }}
                </x-adminlte-card>

                <x-adminlte-card title="KILOMETRAJE" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->kilometraje }}
                </x-adminlte-card>

                <x-adminlte-card title="PRECIO" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->precio }}
                </x-adminlte-card>

                <x-adminlte-card title="AÑO" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->año }}
                </x-adminlte-card>

                <x-adminlte-card title="DESCRIPCION TECNICA" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->details1 }}
                </x-adminlte-card>

                <x-adminlte-card title="DESCRIPCION VISUAL" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->details2 }}
                </x-adminlte-card>

                <x-adminlte-card title="DETALLES" theme="dark" icon="fas fa-lg fa-moon">
                    {{ $vehiculo->details3 }}
                </x-adminlte-card>

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
