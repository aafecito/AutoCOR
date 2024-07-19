@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="display: flex; justify-content:center;">ADMINISTRACION DE VEHICULOS</h1>
@stop

@section('content')
    <h4>Lista de vehiculos</h4>
    <p class="m-2">Aqui podrás editar y eliminar autos</p>
    <p class="m-2">además de crear nuevos</p>
    <div class="card">
        @can('Crear cliente')
            <div class="card-head" style="display: flex; justify-content:center;">
                <a href="{{ route('vehiculo.create') }}" class="btn btn-success mt-5 mr-2">
                    <i class="fa fa-plus"></i>
                    Nuevo Auto</a>
            </div>
        @endcan
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Stock', 'Placa', 'Motor', 'Chasis', 'Marca', 'Modelo', 'Imagen', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

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
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->stock }}</td>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->nchasis }}</td>
                        <td>{{ $vehiculo->nmotor }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/autos' . '/' . $vehiculo->image }}" alt=""
                                width="100px" height="100px">
                        </td>
                        <td>
                            <nobr><a href="{{ route('vehiculo.edit', $vehiculo) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('vehiculo.destroy', $vehiculo) }}" method="POST"
                                    class="formEliminar" style="display:inline">
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
                    text: "Estas a punto de eliminar un vehiculo!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "El vehiculo ha sido eliminado.",
                            icon: "success"
                        });
                        this.submit();
                    }
                });
            })
        })
    </script>
@stop
