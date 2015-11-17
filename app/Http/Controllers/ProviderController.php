<?php namespace App\Http\Controllers;

use App\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProviderController extends Controller
{

    public function getRegistrar() {
        $proveedores = Provider::all();
        return view('proveedor.proveedores', [ 'proveedores' => $proveedores ]);
    }

    public function getEditar($id) {
        $proveedor = Provider::findOrFail($id);
        return view('proveedor.proveedor-editar', [ 'proveedor' => $proveedor ]);
    }

    public function postRegistrar(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'ruc' => 'required|digits:11',
            'address' => 'required|string',
            'bank' => 'min:3',
            'phone' => 'required|min:6',
            'email' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect('proveedores')
                ->withInput()
                ->withErrors($validator);
        }

        $Proveedor = new Provider;
        $Proveedor->name = $request->name;
        $Proveedor->ruc = $request->ruc;
        $Proveedor->bank = $request->bank;
        $Proveedor->account = $request->account;
        $Proveedor->address = $request->address;
        $Proveedor->phone = $request->phone;
        $Proveedor->email = $request->email;
        $Proveedor->web = $request->web;
        $Proveedor->save();

        return redirect('proveedores');

    }

    public function putEditar(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'ruc' => 'required|digits:11',
            'address' => 'required|string',
            'bank' => 'min:3',
            'phone' => 'required|min:6',
            'email' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect('proveedores')
                ->withInput()
                ->withErrors($validator);
        }

        $Proveedor = Provider::findOrFail($id);

        $Proveedor->name = $request->name;
        $Proveedor->bank = $request->bank;
        $Proveedor->account = $request->account;
        $Proveedor->address = $request->address;
        $Proveedor->phone = $request->phone;
        $Proveedor->email = $request->email;
        $Proveedor->web = $request->web;
        $Proveedor->save();

        return redirect('proveedores');
    }

    public function delete($id) {
        Provider::findOrFail($id)->delete();
        return redirect('proveedores');
    }
}