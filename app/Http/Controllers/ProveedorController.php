<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $personas = DB::table('persona')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('tipo', '=', 'Proveedor')
                ->orwhere('num_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo', '=', 'Proveedor')
                ->orderBy('idpersona', 'desc')
                ->paginate(4);
            return view('compras.proveedor.index', ["personas" => $personas, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('compras.proveedor.create');
    }

    public function store(PersonaFormRequest $request)
        /*almacena el modelo del objeto categoria en la tabla categoria de  la base de datos*/
    {
        $persona = new Persona;
        $persona->tipo = 'Proveedor';
        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento= $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email= $request->get('email');

        $persona->save();
        return Redirect::to('compras/proveedor'); //despues de guardar, redireciona a la vista almacen/categoria
    }

    public function show($id)
    {
        return view("compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("compras.proveedor.edit", ["persona"=>Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);

        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento= $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email= $request->get('email');

        $persona->update();
        return Redirect::to('compras/proveedor');
    }


    public function destroy($id)
    {
        $persona = Persona::FindOrFail($id); //con findorfile se obtienen todos los valores de la tabla persona
        $persona->tipo = 'Inactivo';
        $persona->update();
        return Redirect::to('compras/proveedor');
    }
}
