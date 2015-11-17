@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-title">
        <h1>Clientes</h1>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('cliente') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="ruc" class="control-label">R.U.C</label>
                <input type="text" name="ruc" class="form-control">
            </div>

            <div class="form-group">
                <label for="address" class="control-label">Dirección</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">Teléfono</label>
                <input type="text" name="phone" class="form-control">
            </div>           

            <div class="form-group">
                <label for="email" class="control-label">E-mail</label>
                <input type="text" name="email" class="form-control">
            </div>        

            <div class="form-group">                
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Registrar cliente
                </button>
            </div>
        </form>
    </div>
</div>

<div class="col-md-12">
    <!-- Tabla -->
        @if (count($clientes) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de clientes
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Cliente</th>
                            <th>R.U.C.</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>E-mail</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="table-text"><div>{{ $cliente->name }}</div></td>
                                <td class="table-text"><div>{{ $cliente->ruc }}</div></td>
                                <td class="table-text"><div>{{ $cliente->address }}</div></td>
                                <td class="table-text"><div>{{ $cliente->phone }}</div></td>
                                <td class="table-text"><div>{{ $cliente->email }}</div></td>

                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='clientes/{{ $cliente->id }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('cliente') }}/{{ $cliente->id }}" method="POST">
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