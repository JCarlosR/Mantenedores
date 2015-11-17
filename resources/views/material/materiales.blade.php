@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-title">
        <h1>Materiales</h1>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('material') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">(*)Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="descripcion" class="control-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control">
            </div>

            <div class="form-group">
                <label for="precio_compra" class="control-label">(*)Precio de compra</label>
                <input type="text" name="precio_compra" class="form-control">
            </div>

            <div class="form-group">
                <label for="precio_venta" class="control-label">(*)Precio de venta</label>
                <input type="text" name="precio_venta" class="form-control">
            </div>

            <div class="form-group">
                <label for="moneda" class="control-label">Moneda</label>
                <p ><input type="radio" name="moneda" value="1" checked>Soles</p>
                <p ><input type="radio" name="moneda" value="0">Dólares</p>
            </div>           

            <div class="form-group">
                <label for="email" class="control-label">(*)Unidad de entrega</label>
                <select name="unidad_entrega_id" class="form-control" >
                    @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id }}">{{ $unidad->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">(*)Familia</label>
                <select name="familia_id" class="form-control" >
                    @foreach($familias as $familia)
                        <option value="{{ $familia->id }}">{{ $familia->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">(*)Marca</label>
                <select name="marca_id" class="form-control" >
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stock_min" class="control-label">(*)Stock mínimo</label>
                <input type="text" name="stock_min" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Registrar material
                </button>
            </div>
        </form>
    </div>
</div>

<div class="col-md-12">
    <!-- Tabla -->
        @if (count($materiales) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de materiales
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Material</th>
                            <th>Descripcion</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Moneda</th>
                            <th>Familia</th>
                            <th>Marca</th>
                            <th>Unidad de entrega</th>
                            <th>Stock mínimo</th>
                        </thead>
                        <tbody>
                        @foreach ($materiales as $material)
                            <tr>
                                <td class="table-text"><div>{{ $material->name }}</div></td>
                                <td class="table-text"><div>{{ $material->descripcion }}</div></td>
                                <td class="table-text"><div>{{ $material->precio_compra }}</div></td>
                                <td class="table-text"><div>{{ $material->precio_venta }}</div></td>
                                <td class="table-text"><div> @if($material->moneda == 1)Soles @else Dólares @endif</div></td>
                                <td class="table-text"><div>{{ $material->familia->name }}</div></td>
                                <td class="table-text"><div>{{ $material->marca->name }}</div></td>
                                <td class="table-text"><div>{{ $material->unidad->name }}</div></td>
                                <td class="table-text"><div>{{ $material->stock_min }}</div></td>


                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='materiales/{{ $material->id }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('material') }}/{{ $material->id }}" method="POST">
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