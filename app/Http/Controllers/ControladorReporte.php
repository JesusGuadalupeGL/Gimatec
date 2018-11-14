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

class ControladorReporte extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios =servicios:: all();
        $mantenimientos =mantenimientos:: all();
        return view ('sistema.altadetalle')
            ->with('servicios', $servicios)
            ->with('mantenimientos', $mantenimientos);
   
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
	     
        'descripcion'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
        'cantidad'=>['required','regex:/^[0-9]+$/'],
        'subtotal'=>['required','regex:/^[0-9]+[.][0-9]{2}+$/'],
        ]);
        
   
   //insert into maestros...     
       $det = new detallesers;
       $det->descripcion = $request->descripcion;
       $det->cantidad = $request->cantidad;
       $det->subtotal = $request->subtotal;
       $det->idserv = $request->idserv;
       $det->idmant = $request->idmant;
       $det->save();
       //return proceso && mensaje;
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

    public function reportedetalle() 
    {
        $detalles = detallesers::orderBy('cantidad', 'asc')->get();
        return view ('sistema.reportedetalle')
        ->with ('detalles', $detalles);
    }
	
	    public function reporteser() 
    {
        $servicios = servicios::orderBy('tiposer', 'asc')->get();
        return view ('sistema.reporteser')
        ->with ('servicios', $servicios);
    }

}
