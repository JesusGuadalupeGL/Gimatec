<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\maquinas;

class c_maquinas extends Controller
{
	public function inicio()
	{
        return view('sistema.inicio');
	}
	public function consulta()
	{
		$maquinas = maquinas::all();
        return view('sistema.consultamaquina')->with('maquinas', $maquinas);
	}
    public function altaMaquina()
	{
        return view('sistema.catalogo_maqui');
    }

    public function guardamaquina(Request $request)
	{
		$validacion = $this->validate($request,
		['nombre'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'archivo'=>'required|image|mimes:jpg,jpeg,png,gif',
		'descripcion'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'precio'=>'required|numeric',
		'stock'=>['required','regex:/^[0-9]+$/'],
		'categoria'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'existencias'=>'required|numeric'
		]);

		$file = $request->file('archivo');
		if($file!="")
		{
			$ldate = date('Ymd_His_');
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
		
		return redirect ('/head');
	}
}
