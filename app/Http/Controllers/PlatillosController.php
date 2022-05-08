<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Platillo;

class PlatillosController extends Controller
{
    public function index() {
        $platillos = Platillo::all();
        $argumentos = array();
        $argumentos['platillos'] = $platillos;
        return view("platillos.index", $argumentos);
    }

    public function create() {
        return view('platillos.create');
    }

    public function store(Request $request) {
        $nuevoPlatillo = new Platillo();
        $nuevoPlatillo->nombre = $request->input('nombre');
        $nuevoPlatillo->precio = $request->input('precio');
        $nuevoPlatillo->descripcion = $request->input('descripcion');

        if ($request->file('foto')) {
            $path_foto = $request->file('foto')->store('public/fotos');
            if ($path_foto) {
                $nuevoPlatillo->foto = $request->file('foto')->hashName();
            }
        }

        if($nuevoPlatillo->save()) {
            return redirect()->route('platillos.index')->with('exito', 'platillo creado con exito');;
        }
        return redirect()->route('platillos.create')->with('exito', 'platillo creado con exito');
    }

    public function edit($id) {
        $platillo = Platillo::find($id);

        if ($platillo){
            $argumentos = array();
            $argumentos['platillo'] = $platillo;
            return view('platillos.edit', $argumentos);
        }
        return redirect()->route('platillos.index')->with('error', 'No existe el platillo');
    }

    public function update($id, Request $request) {
        $platillo = Platillo::Find($id);
        if ($platillo){
            $platillo->nombre = $request->input('nombre');
            $platillo->precio = $request->input('precio');
            $platillo->descripcion = $request->input('descripcion');

            if ($request->file('foto')) {
                $path_foto = $request->file('foto')->store('public/fotos');
                if ($path_foto) {
                    $platillo->foto = $request->file('foto')->hashName();
                }
            }

            if ($platillo->save()) {
                return redirect()->route('platillos.index', $platillo->id)->with('exito', 'Se actualizo correctamente el platillo');
            }

            return edirect()->route('platillos.edit', $platillo->id)->with('error', 'No se pudo actualizar');
        }

        return redirect()->route('platillos.index')->with('error', 'No existe el platillo');
    }

    public function destroy($id) {
        $platillo = Platillo::find($id);
        if ($platillo) {
            if($platillo->delete()) {
                return redirect()->route('platillos.index')->with('exito', 'platillo eliminado');
            }
            return redirect()->route('platillos.index')->with('error', 'No se encontro el platillo');
        }
        return redirect()->route('platillos.index')->with('error', 'No se encontro el platillo');
    }
}
