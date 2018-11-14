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

class ControladorServicio extends Controller
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
        $clientes =clientes:: all();
        $usuarios =usuarios:: all();
    return view ('sistema.altaservicio')
            ->with('clientes', $clientes)
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
        'fecha'=>'required',
        'total'=>['required','regex:/^[0-9]+[.][0-9]{2}$/'],
        'tiposer'=>['required','regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/']
        ]);
        
   
   //insert into maestros...     
       $ser = new servicios;
       $ser->fecha = $request->fecha;
       $ser->total = $request->total;
       $ser->tiposer = $request->tiposer;
       $ser->idcli = $request->idcli;
       $ser->idu = $request->idu;
       $ser->save();
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
	public function reporteser() 
    {
        $servicios = servicios::orderBy('tiposer', 'asc')->get();
        return view ('sistema.reporteser')
        ->with ('servicios', $servicios);
    }
}
