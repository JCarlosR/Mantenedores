@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
            <h1>Almacenes</h1>
        </div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

                    <!-- New Task Form -->
            <form action="{{ url('almacen') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group col-md-6">
                    <label for="name" class="control-label">Nombre</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="type" class="control-label">Tipo</label>
                    <div class="radio">
                        <label ><input type="radio" name="type" value="0" checked>Central</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="type" value="1">Secundario</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="state" class="control-label">Estado</label>
                    <div class="radio">
                        <label><input type="radio" name="state" value="0" checked>Activo</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="state" value="1">Inactivo</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">Ciudad</label>
                    <select class="form-control" name="city">
                        @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="comments" class="control-label">Observaciones</label>
                    <div class="form-group">
                        <textarea name="comments" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        <i class="fa fa-plus"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12">
        <!-- Tabla -->
        @if (count($almacenes) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de almacenes
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Almacén</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th>Observaciones</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($almacenes as $almacen)
                            <tr>
                                <td class="table-text"><div>{{ $almacen->name  }}</div></td>
                                <td class="table-text"><div> @if( $almacen->type==0 ) Central @else Secundario @endif </div></td>
                                <td class="table-text"><div> @if($almacen->state==0 )Activo @else Inactivo @endif</div></td>
                                <td class="table-text"><div>{{ $almacen->city->name }}</div></td>
                                <td class="table-text"><div>{{ $almacen->comments }}</div></td>

                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='almacenes/{{ $almacen->id }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('almacen') }}/{{ $almacen->id }}" method="POST">
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