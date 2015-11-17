<?php namespace App\Http\Controllers;

use App\City;
use App\Familias;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AlmacenController extends Controller
{

    public function getRegistrar() {
        $almacenes = Warehouse::all();
        $ciudades = City::all();
        return view('almacen.almacenes', [ 'almacenes' => $almacenes,'ciudades'=>$ciudades ]);
    }


    public function getEditar($id) {
        $almacen = Warehouse::findOrFail($id);
        $ciudades = City::all();
        return view('almacen.almacen-editar', [ 'almacen' => $almacen,'ciudades'=>$ciudades ]);
    }

    public function postRegistrar(Request $request) {

        $validator  = Validator::make($request->all(), [
            'name'  => 'required|max:70',
        ]);

        if ($validator->fails()) {
            return redirect('almacenes')
                ->withInput()
                ->withErrors($validator);
        }

        $wareHouse = new Warehouse();
        $wareHouse->name  = $request->name;
        $wareHouse->type  = $request->type;
        $wareHouse->state = $request->state;
        $wareHouse->city_id  = $request->city;
        $wareHouse->comments = $request->comments;
        $wareHouse->save();

        return redirect('almacenes');

    }

    public function putEditar(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:70',
        ]);

        if ($validator->fails()) {
            return redirect('/almacenes')
                ->withInput()
                ->withErrors($validator);
        }

        $wareHouse = Warehouse::findOrFail($id);
        $wareHouse->name = $request->name;
        $wareHouse->type = $request->type;
        $wareHouse->state = $request->state;
        $wareHouse->city_id = $request->city;
        $wareHouse->comments = $request->comments;
        $wareHouse->save();

        return redirect('almacenes');
    }

    public function delete($id) {
        Warehouse::findOrFail($id)->delete();
        return redirect('/almacenes');
    }
}