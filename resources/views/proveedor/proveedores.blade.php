@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-title">
        <h1>Proveedores</h1>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('proveedor') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">(*) Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="ruc" class="control-label">(*) R.U.C</label>
                <input type="text" name="ruc" class="form-control">
            </div>

            <div class="form-group">
                <label for="bank" class="control-label">Banco</label>
                <input type="text" name="bank" class="form-control">
            </div>

            <div class="form-group">
                <label for="account" class="control-label">Cuenta corriente</label>
                <input type="text" name="account" class="form-control">
            </div>

            <div class="form-group">
                <label for="address" class="control-label">(*) Dirección</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">(*) Teléfono</label>
                <input type="text" name="phone" class="form-control">
            </div>           

            <div class="form-group">
                <label for="email" class="control-label">E-mail</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="web" class="control-label">Web</label>
                <input type="text" name="web" class="form-control">
            </div>

            <div class="form-group">                
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Registrar proveedor
                </button>
            </div>
        </form>
    </div>
</div>

<div class="col-md-12">
    <!-- Tabla -->
        @if (count($proveedores) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de proveedores
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Proveedor</th>
                            <th>R.U.C.</th>
                            <th>Banco</th>
                            <th>Cuenta corriente</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>E-mail</th>
                            <th>Web</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td class="table-text"><div>{{ $proveedor->name }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->ruc }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->bank }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->account }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->address }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->phone }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->email }}</div></td>
                                <td class="table-text"><div>{{ $proveedor->web }}</div></td>

                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='proveedores/{{ $proveedor->id }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('proveedor') }}/{{ $proveedor->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
</div>
@endsection