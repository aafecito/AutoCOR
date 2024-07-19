@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE PERMISOS</h1>
@stop

@section('content')
    <h4>Permisos dentro de la aplicacion</h4>
    <p>Aqui puedes crear y eliminar permisos</p>
    <div class="card">
        <div class="card-header" style="display:flex; justify-content:center;">
            <x-adminlte-button label="Nuevo permiso" theme="success" icon="fas fa-plus" class="float-center" data-toggle="modal"
                data-target="#modalPurple" />
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Permiso', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

                $btnEdit = '';
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
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <nobr>
                                <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" class="formEliminar"
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
            {{-- Themed --}}
            <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="success" icon="fas fa-bolt" size='lg'
                disable-animations>
                <form action="{{ route('permisos.store') }}" method="POST" id="formSavePer">
                    @csrf
                    {{-- With prepend slot --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nuevo permiso" label-class="text-dark"
                        id="namePer">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-dark"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-button type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                </form>
            </x-adminlte-modal>
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
                    text: "Estas a punto de eliminar un permiso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "El permiso ha sido eliminado",
                            icon: "success"
                            showConfirmButton: false
                        });
                        this.submit();
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#formSavePer').submit(function(e) {
                e.preventDefault();
                var nombrePerValue = $('#namePer').val().trim();
                if (nombrePerValue === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Por favor, ingresa un nombre para el permiso.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Nuevo permiso registrado",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.submit();
                }
            })

        })
    </script>
@stop
