<?php namespace App\Http\Controllers;

use App\Familia;
use App\Familias;
use App\Http\Controllers\Controller;
use App\Marca;
use App\Material;
use App\UnidadEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MaterialController extends Controller
{

    public function getRegistrar() {
        $materiales = Material::all();
        $unidades = UnidadEntrega::all();
        $familias = Familia::all();
        $marcas = Marca::all();
        return view('material.materiales', [ 'materiales' => $materiales, 'unidades' => $unidades, 'familias' => $familias, 'marcas' => $marcas ]);
    }


    public function getEditar($id) {
        $material = Material::findOrFail($id);
        $unidades = UnidadEntrega::all();
        $familias = Familia::all();
        $marcas = Marca::all();
        return view('material.material-editar', [ 'material' => $material, 'unidades' => $unidades, 'familias' => $familias, 'marcas' => $marcas  ]);
    }

    public function postRegistrar(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'moneda' => 'required|boolean',
            'familia_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'unidad_entrega_id' => 'required|integer',
            'stock_min' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            return redirect('materiales')
                ->withInput()
                ->withErrors($validator);
        }

            $material = new Material;
            $material->name = $request->name;
            $material->descripcion = $request->descripcion;
            $material->precio_compra = $request->precio_compra;
            $material->precio_venta = $request->precio_venta;
            $material->moneda = $request->moneda;
            $material->familia_id = $request->familia_id;
            $material->marca_id = $request->marca_id;
            $material->unidad_entrega_id = $request->unidad_entrega_id;
            $material->stock_min = $request->stock_min;
            $material->save();

        return redirect('materiales');

    }

    public function putEditar(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:70',
            'descripcion' => 'string',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'moneda' => 'required|boolean',
            'familia_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'unidad_entrega_id' => 'required|integer',
            'stock_min' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('materiales')
                ->withInput()
                ->withErrors($validator);
        }

        $material = Material::findOrFail($id);

        $material->name = $request->name;
        $material->descripcion = $request->descripcion;
        $material->precio_compra = $request->precio_compra;
        $material->precio_venta = $request->precio_venta;
        $material->moneda = $request->moneda;
        $material->familia_id = $request->familia_id;
        $material->marca_id = $request->marca_id;
        $material->unidad_entrega_id = $request->unidad_entrega_id;
        $material->stock_min = $request->stock_min;
        $material->save();

        return redirect('materiales');
    }

    public function delete($id) {
        Material::findOrFail($id)->delete();
        return redirect('materiales');
    }
}