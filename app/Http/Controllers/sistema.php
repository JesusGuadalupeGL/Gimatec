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

class sistema extends Controller
{


//procesos realizados con el catalogo CLIENTES
    //ALTA
    public function altacliente()
	{
        $municipios =municipio:: all();
        $usuarios =usuarios:: all();
    return view ('proyecto.altacliente')
            ->with('municipios', $municipios)
            ->with('usuarios', $usuarios);
    }
	public function guardacliente(Request $request)
	{   
    $nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $empresa = $request->empresa;
    $telefono = $request->telefono;
	$calle = $request->calle;
	$no_int = $request->no_int;
	$no_ext = $request->no_ext;
    $colonia= $request->colonia;
	$idm = $request->idm;
    $cp = $request->cp;
    $idu = $request->idu;
    $ide = $request->ide;
    $archivo = $request->archivo;
	//no se resive el archivo
	$this->validate($request,[
         'nombre'=>'required|alpha',
         'apat'=>'required|alpha',
         'amat'=>'required|alpha',
         'empresa'=>'required|alpha',
         'telefono'=>'required|numeric|min:10',
		 'calle'=>'required|alpha',
		 'no_int'=>'required|numeric|min:10',
		 'no_ext'=>'required|numeric|min:10',
		 'colonia'=>'required|alpha',
		 'cp'=>['regex:/^[0-9]{5}/'],
         'archivo' => 'image|mimes:jpg,jpeg,gif,png'
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
        $img2 = 'sinfoto.jpg';
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
        $clie->archivo = $request->archivo;
        $clie->save();
        
        $proceso = "ALTA DE cliente";
        $mensaje = "cliente guardado correctamente";
        return view ("proyecto.mensaje")
        ->with('proceso', $proceso)
        ->with('mensaje',$mensaje);
	  
	}
//REPORTE CLIENTE
public function reportecliente() 
    {
        $clientes = clientes::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reportecliente')
        ->with ('clientes', $clientes);
    }

   
//PROCESOS REALIZADOS CON EL CATALOGO USUARIOS

public function altausuario()
	{
        return view ('proyecto.altausuario');
    }

    //procesos realizados con el catalogo CLIENTES
    //ALTA
    public function altaservicio()
	{

        $clientes =clientes:: all();
        $usuarios =usuarios:: all();
    return view ('sistema.altaservicio')
            ->with('clientes', $clientes)
            ->with('usuarios', $usuarios);
            
    }
	
	
	
	public function guardaservicio(Request $request)
	{
		
	//no se resive el archivo
	 $this->validate($request,[
         'fecha'=>'required',
         'total'=>'required|numeric|min:7',
         'tiposer'=>'required|alpha'
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
	
	
	//REPORTE CLIENTE
    public function reporteser() 
    {
        $servicios = servicios::orderBy('tiposer', 'asc')->get();
        return view ('sistema.reporteser')
        ->with ('servicios', $servicios);
    }
	
	// ALTA DETALLE
	
	 public function altadetalle()
	{

        $servicios =servicios:: all();
        $mantenimientos =mantenimientos:: all();
        return view ('sistema.altadetalle')
            ->with('servicios', $servicios)
            ->with('mantenimientos', $mantenimientos);
    }
    
	
	public function guardadetalle(Request $request)
	{	 
	//no se resive el archivo
	 $this->validate($request,[
	     
         'descripcion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'cantidad'=>'required|numeric|min:7',
         'subtotal'=>'required|numeric|min:7',
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
	
	//REPORTE DETALLE
    public function reportedetalle() 
    {
        $detalles = detallesers::orderBy('cantidad', 'asc')->get();
        return view ('sistema.reportedetalle')
        ->with ('detalles', $detalles);
    }
    
}
