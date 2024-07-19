@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE VENTAS</h1>
@stop

@section('content')
    <h4>Administra las ventas de vehiculos</h4>
    <p>Aqui puedes editar y eliminar ventas</p>
    <div class="card">
        @can('Crear cliente')
            <div class="card-head">
                <a href="{{ route('venta.create') }}" class="btn btn-success float-right mt-2 mr-2">Nueva venta</a>
            </div>
        @endcan
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Cedula', 'Apellidos', 'Nombres', 'Telefono', 'Placa', 'Marca', 'Modelo', 'Precio', 'Año', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

                //$btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';

                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->dni }}</td>
                        <td>{{ $venta->apellido }}</td>
                        <td>{{ $venta->nombre }}</td>
                        <td>{{ $venta->telefono }}</td>
                        <td>{{ $venta->vehiculo->placa }}</td>
                        <td>{{ $venta->vehiculo->marca }}</td>
                        <td>{{ $venta->vehiculo->modelo }}</td>
                        <td>{{ $venta->vehiculo->precio }}</td>
                        <td>{{ $venta->vehiculo->año }}</td>
                        <td>
                            <nobr>
                                @can('Despachar')
                                    <a href="{{ route('despacho.edit', $venta) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                @endcan

                                <form action="{{ route('venta.destroy', $venta) }}" method="POST" class="formEliminar"
                                    style="display:inline">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>

                                {!! $btnDetails !!}
                            </nobr>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Seguro?",
                    text: "Estas a punto de eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        this.submit();
                    }
                });
            })
        })
    </script>
@stop
