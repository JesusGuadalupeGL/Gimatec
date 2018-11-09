<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\cliente;
use App\municipio;
use App\usuario;
use App\servicio;
use App\detalle;
use App\mantenimiento;
class c_detalle extends Controller
{
    //procesos realizados con el catalogo CLIENTES
    //ALTA
    public function altaservicio()
	{

    $clavequesigue = servicio::orderBy('iddser','desc')
                              ->take(1)
                                ->get();
        $ids = $clavequesigue[0]->iddser+1;

        //select * from carreras
        //orm eloquent
        $clientes =cliente:: all();
        $usuarios =usuario:: all();
    return view ('sistema.altaservicio')
            ->with('clientes', $clientes)
            ->with('usuarios', $usuarios)
            ->with('ids',$ids);
    }
	
	
	
	public function guardaservicio(Request $request)
	{
	$id = $request->id;		
	$fecha = $request->fecha;
    $total = $request->total;
    $tiposer = $request->tiposer;
	$usuario_id = $request->usuario_id;
    $cliente_id = $request->cliente_id;
	//no se resive el archivo
	 $this->validate($request,[
	     'id'=>'required|numeric',
         'fecha'=>'required',
         'total'=>'required|numeric|min:7',
         'tiposer'=>'required|alpha'
         ]);
         
    
    //insert into maestros...     
        $ser = new servicio;
        $ser->id = $request->id;
        $ser->fecha = $request->fecha;
        $ser->total = $request->total;
        $ser->tiposer = $request->tiposer;
        $ser->cliente_id = $request->cliente_id;
        $ser->usuario_id = $request->usuario_id;
        $ser->save();
        //return proceso && mensaje;
        $proceso = "ALTA DE cliente";
        $mensaje = "cliente guardado correctamente";
        return view ("sistema.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
	
	
	//REPORTE CLIENTE
    public function reporteser() 
    {
        $servicios = servicio::orderBy('tiposer', 'asc')->get();
        return view ('sistema.reporteser')
        ->with ('servicios', $servicios);
    }
	
	// ALTA DETALLE
	
	 public function altadetalle()
	{

    $clavequesigue = detalle::orderBy('id','desc')
                              ->take(1)
                                ->get();
        $idd = $clavequesigue[0]->id+1;

        //select * from carreras
        //orm eloquent
        $servicios =servicio:: all();
        $mantenimientos =mantenimiento:: all();
        return view ('sistema.altadetalle')
            ->with('servicios', $servicios)
            ->with('mantenimientos', $mantenimientos)
            ->with('idd',$idd);
    }
	
	public function guardadetalle(Request $request)
	{
	$id = $request->id;		
	$descripcion = $request->descripcion;
    $cantidad = $request->cantidad;
    $subtotal = $request->subtotal;
	$servicio_id = $request->servicio_id;
    $mantenimiento_id = $request->mantenimiento_id;
	//no se resive el archivo
	 $this->validate($request,[
	     'id'=>'required|numeric',
         'descripcion'=>'required|alpha',
		 'cantidad'=>'required|numeric|min:7',
         'subtotal'=>'required|numeric|min:7',
         ]);
         
    
    //insert into maestros...     
        $det = new detalle;
        $det->id = $request->id;
        $det->descripcion = $request->descripcion;
        $det->cantidad = $request->cantidad;
        $det->subtotal = $request->subtotal;
        $det->servicio_id = $request->servicio_id;
        $det->mantenimiento_id = $request->mantenimiento_id;
        $det->save();
        //return proceso && mensaje;
        $proceso = "ALTA DE cliente";
        $mensaje = "cliente guardado correctamente";
        return view ("sistema.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
	
	//REPORTE DETALLE
    public function reportedetalle() 
    {
        $detalles = detalle::orderBy('cantidad', 'asc')->get();
        return view ('sistema.reportedetalle')
        ->with ('detalles', $detalles);
    }
	  
	
	
	

}
