@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel-title">
            <h1>Proveedores</h1>
        </div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')


            <form action="{{ url('proveedor') }}/{{ $proveedor->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name" class="control-label">(*) Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $proveedor->name }}">
                </div>

                <div class="form-group">
                    <label for="bank" class="control-label">Banco</label>
                    <input type="text" name="bank" class="form-control" value="{{ $proveedor->bank }}">
                </div>

                <div class="form-group">
                    <label for="account" class="control-label">Cuenta corriente</label>
                    <input type="text" name="account" class="form-control" value="{{ $proveedor->account }}">
                </div>

                <div class="form-group">
                    <label for="address" class="control-label">(*)Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{ $proveedor->address }}">
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control" value="{{ $proveedor->phone }}">
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">E-mail</label>
                    <input type="text" name="email" class="form-control" value="{{ $proveedor->email }}">
                </div>

                <div class="form-group">
                    <label for="web" class="control-label">Web</label>
                    <input type="text" name="web" class="form-control" value="{{ $proveedor->web }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Editar proveedor
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection