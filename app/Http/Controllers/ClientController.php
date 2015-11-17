<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{

    public function getRegistrar() {
        $clientes = Client::all();
        return view('cliente.clientes', [ 'clientes' => $clientes ]);
    }

    public function getEditar($id) {
        $cliente = Client::findOrFail($id);
        return view('cliente.cliente-editar', [ 'cliente' => $cliente ]);
    }

    public function postRegistrar(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'ruc' => 'required|numeric|digits:11',
            'phone' => 'min:6|numeric',
            'email' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect('clientes')
                ->withInput()
                ->withErrors($validator);
        }

        $client = new Client;
        $client->name = $request->name;
        $client->ruc = $request->ruc;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->save();

        return redirect('clientes');

    }

    public function putEditar(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'ruc' => 'required|numeric|digits:11',
            'phone' => 'min:6|numeric',
            'email' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect('clientes')
                ->withInput()
                ->withErrors($validator);
        }

        $client = Client::findOrFail($id);

        $client->name = $request->name;
        $client->ruc = $request->ruc;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->save();

        return redirect('clientes');
    }

    public function delete($id) {
        Client::findOrFail($id)->delete();
        return redirect('clientes');
    }
}