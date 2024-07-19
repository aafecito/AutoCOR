@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACION DE ROLES</h1>
@stop

@section('content')
    <h4>Roles dentro de la aplicacion</h4>
    <p>Aqui puedes agregar, editar o eliminar roles</p>
    <div class="card">
        <div class="card-header" style="display:flex; justify-content:center;">
            <x-adminlte-button label="Nuevo Rol" theme="success" icon="fa fa-plus" class="float-center" data-toggle="modal"
                data-target="#modalPurple" />
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Nombre del rol', ['label' => 'Opciones', 'no-export' => true, 'width' => 5]];

                //$btnEdit = '';

                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';

                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
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
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="display: inline-flex;">
                            <a href="{{ route('roles.edit', $role) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="formEliminar"
                                style="display:inline">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
            {{-- Themed --}}
            <x-adminlte-modal class="modalRole" id="modalPurple" title="Añadir un nuevo rol" theme="success"
                icon="fa fa-plus" size='lg' disable-animations>
                <form action="{{ route('roles.store') }}" method="POST" id="formSaveRole">
                    @csrf
                    {{-- With prepend slot --}}
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nuevo rol" label-class="text-dark"
                        id="nameRol">
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
                    text: "Estas a punto de eliminar un rol!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Eliminado!",
                            text: "El rol ha sido eliminado.",
                            icon: "success",
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
            $('#formSaveRole').submit(function(e) {
                e.preventDefault();
                var nombreRolValue = $('#nameRol').val().trim();
                if (nombreRolValue === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Por favor, ingresa un nombre para el rol.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Nuevo rol registrado",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.submit();
                }
            })

        })
    </script>
@stop
