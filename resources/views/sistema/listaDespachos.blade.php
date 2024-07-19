@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE VENTAS</h1>
@stop

@section('content')
    <h4>Administra las ventas de vehiculos</h4>
    <p>Aqui puedes editar y eliminar ventas</p>
    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Timestamp', 'Placa', 'Marca', 'Modelo', 'Apellido', 'Nombre', 'Bodega', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

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
                @foreach ($despachos as $despacho)
                    <tr>
                        <td>{{ $despacho->id }}</td>
                        <td>{{ $despacho->created_at }}</td>
                        <td>{{ $despacho->venta->vehiculo->placa }}</td>
                        <td>{{ $despacho->venta->vehiculo->marca }}</td>
                        <td>{{ $despacho->venta->vehiculo->modelo }}</td>
                        <td>{{ $despacho->venta->apellido }}</td>
                        <td>{{ $despacho->venta->nombre }}</td>
                        <td>{{ $despacho->bodega }}</td>
                        <td>
                            <nobr>
                                <form action="{{ route('despacho.destroy', $despacho) }}" method="POST" class="formEliminar"
                                    style="display:inline">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
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
