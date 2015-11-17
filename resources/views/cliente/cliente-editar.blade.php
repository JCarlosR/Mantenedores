@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-title">
        <h1>Clientes</h1>
    </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')


        <form action="{{ url('cliente') }}/{{ $cliente->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name" class="control-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $cliente->name }}">
            </div>

            <div class="form-group">
                <label for="ruc" class="control-label">R.U.C</label>
                <input type="text" name="ruc" class="form-control" value="{{ $cliente->ruc }}">
            </div>

            <div class="form-group">
                <label for="address" class="control-label">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{ $cliente->address }}">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{ $cliente->phone }}">
            </div>           

            <div class="form-group">
                <label for="email" class="control-label">E-mail</label>
                <input type="text" name="email" class="form-control" value="{{ $cliente->email }}">
            </div>        

            <div class="form-group">                
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Editar cliente
                </button>
            </div>
        </form>
    </div>
</div>
@endsection