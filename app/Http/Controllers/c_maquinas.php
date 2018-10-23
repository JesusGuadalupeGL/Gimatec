<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Maquinas;

class c_maquinas extends Controller
{
    public function altaMaquina()
	{
        return view('sistema.catalogo_maqui');
    }

    public function guardaMaquina(Request $request)
	{
		$validacion = $this->validate($request,
		['nombre'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'archivo'=>'image|mimes:jpg,jpeg,png,gif',
		'descripcion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'precio'=>['regex:/^[0-9].[0-9]{2}+$/'],
		'stock'=>['regex:/^[0-9]+$/'],
		'existencias'=>'required|numeric'
		]);

		$file = $request->file('archivo');
		if($file!="")
		{
			$ldate = date('Ymd_His');
			$img = $file->getClientOriginalName();
			$img2 = $ldate.$img;
			\Storage::disk('local')->put($img2, \File::get($file));
		}
		else
		{
			$img2 = "administrador.png";
		}
		
		$maquina = new maquinas;
		$maquina->nombre = $request->nombre;
		$maquina->archivo = $img2;
		$maquina->descripcion = $request->descripcion;
		$maquina->precio = $request->precio;
		$maquina->stock = $request->stock;
		$maquina->categoria = $request->categoria;
		$maquina->existencias = $request->existencias;
		$maquina->save();
		
		return redirect ('administrador');
	}
}
