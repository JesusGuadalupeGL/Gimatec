<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\clientes;
use App\municipio;
use App\usuarios;
use App\servicios;
use App\detallesers;
use App\mantenimientos;



class ControlladorCliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios =municipio:: all();
        $usuarios =usuarios:: all();
    return view ('proyecto.altacliente')
            ->with('municipios', $municipios)
            ->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	//no se resive el archivo
		$this->validate($request,[
         'nombre'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
         'apat'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
         'amat'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
         'empresa'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
         'telefono'=>['required','regex:/^[0-9]{10}$/'],
		 'calle'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'no_int'=>['required','regex:/^[0-9]/'],
		 'no_ext'=>['required','regex:/^[0-9]/'],
		 'colonia'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'cp'=>['required','regex:/^[0-9]{5}$/'],
         'archivo' =>'required','image|mimes:jpg,jpeg,gif,png'
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
    //insert into maestros...     
        $clie = new clientes;
        $clie->archivo = $img2;
        $clie->nombre = $request->nombre;
        $clie->apat = $request->apat;
        $clie->amat = $request->amat;
        $clie->empresa = $request->empresa;
        $clie->telefono = $request->telefono;
		$clie->calle = $request->calle;
		$clie->no_int = $request->no_int;
		$clie->no_ext = $request->no_ext;
		$clie->colonia = $request->colonia;
        $clie->cp = $request->cp;
        $clie->idm = $request->idm;
        $clie->idu = $request->idu;
        $clie->ide = $request->ide;
        $clie->save();
        
         return redirect ('/head');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function reportecliente() 
    {
        $clientes = clientes::orderBy('idcli', 'asc')->get();
        return view ('proyecto.reportecliente')
        ->with ('clientes', $clientes);
    }
}
