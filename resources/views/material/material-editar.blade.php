@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-title">
        <h1>Material</h1>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <form action="{{ url('material') }}/{{ $material->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name" class="control-label">(*) Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $material->name }}">
            </div>

            <div class="form-group">
                <label for="descripcion" class="control-label"> Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $material->descripcion }}">
            </div>

            <div class="form-group">
                <label for="precio_compra" class="control-label">(*) Precio de compra</label>
                <input type="text" name="precio_compra" class="form-control" value="{{ $material->precio_compra }}">
            </div>

            <div class="form-group">
                <label for="precio_venta" class="control-label">(*) Precio de venta</label>
                <input type="text" name="precio_venta" class="form-control" value="{{ $material->precio_venta }}">
            </div>

            <div class="form-group">
                <label for="moneda" class="control-label">Moneda</label>
                <p ><input type="radio" name="moneda" value="1" @if($material->moneda == 1)checked @endif>Soles</p>
                <p ><input type="radio" name="moneda" value="0" @if($material->moneda == 0)checked @endif>Dólares</p>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">(*) Unidad de entrega</label>
                <select name="unidad_entrega_id" class="form-control" >
                    @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id }}">{{ $unidad->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">(*) Familia</label>
                <select name="familia_id" class="form-control" >
                    @foreach($familias as $familia)
                        <option value="{{ $familia->id }}">{{ $familia->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">(*) Marca</label>
                <select name="marca_id" class="form-control" >
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stock_min" class="control-label">(*) Stock mínimo</label>
                <input type="text" name="stock_min" class="form-control" value="{{ $material->stock_min }}">
            </div>

            <div class="form-group">                
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Editar material
                </button>
            </div>
        </form>
    </div>
</div>
@endsection