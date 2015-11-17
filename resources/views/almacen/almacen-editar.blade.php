@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
            <h1>Almacenes</h1>
        </div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')


            <form action="{{ url('almacen') }}/{{ $almacen->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group col-md-6">
                    <label for="name" class="control-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{$almacen->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="type" class="control-label">Tipo</label>
                    <div class="radio">
                        <label><input type="radio" name="type" @if($almacen->type==0) checked @endif value="0">Central</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="type" @if($almacen->type==1) checked @endif value="1">Secundario</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="state" class="control-label">Estado</label>
                    <div class="radio">
                        <label><input type="radio" name="state" @if($almacen->state==0) checked @endif value="0">Activo</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="state" @if($almacen->state==1) checked @endif value="1">Inactivo</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">Ciudad</label>
                    <select class="form-control" name="city">
                        @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}" @if($ciudad->id==$almacen->city_id) selected @endif>{{$ciudad->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="comments" class="control-label">Observaciones</label>
                    <div class="form-group">
                        <textarea name="comments" class="form-control" >{{$almacen->comments}}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Editar almacén
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection