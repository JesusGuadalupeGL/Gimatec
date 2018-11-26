<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\clientes;
use App\municipio;
use App\usuarios;
use App\estados;
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
    public function eliminac($idcli) 
    {
        clientes::find($idcli)->delete();
		    $proceso = "ELIMINAR CLIENTE";
			$mensaje = "El cliente ha sido eliminado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
            
    }
    public function modificacliente($idcli)
	{
		$cliente = clientes::where('idcli','=',$idcli)->get();
		
		$ide = $cliente[0]->ide;
		$idm = $cliente[0]->idm;
		$idu = $cliente[0]->idu;
		
		$estado=estados::where('ide','=',$ide)->get();
		$demasestados=estados::where('ide','!=',$ide)->get();
		
		$municipio=municipios::where('idm','=',$idm)->get();
        $demasmunicipios=municipios::where('idm','!=',$idm)->get();
        
        $usuario=usuarios::where('idu','=',$idu)->get();
        $demasusuarios=usuarios::where('idu','!=',$idu)->get();
        
		return view('proyecto.modificacli')
								  ->with('cliente',$cliente[0])
								  ->with('ide',$ide)
                                  ->with('idm',$idm)
                                  ->with('idu',$idu)
								  ->with('estado',$estado[0]->estado)
								  ->with('demasestados',$demasestados)
								  ->with('municipio',$municipio[0]->municipio)
                                  ->with('demasmunicipios',$demasmunicipios)
                                  ->with('usuario',$usuario[0]->nombre)
                                  ->with('demasusuarios',$demasusuarios);
	}
	
	

	public function editacliente(Request $request)
	{
        $idcli = $request->idcli;
        $nombre = $request->nombre;
        $apat = $request->apat;
        $amat = $request->amat;
		$empresa= $request->empresa;
		$telefono = $request->telefono;
        $calle= $request->calle;
        $no_int= $request->no_int;
        $no_ext= $request->no_ext;
		$colonia= $request->colonia;
	
        $cp = $request->cp;
        $idm = $request->idm;
        $idu = $request->idu;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
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
      $img2= 'sinfoto.png';
	 }
		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
         $clie =clientes::find($idcli);
         $clie->idcli = $request->idcli;
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
        
			if($file!='')
			{
			$clie->archivo = $img2;
			}
			$clie->save();
		
            return redirect ('/head');
 
	}
	
	public function restaurac($id_cliente)
	{
		clientes::withTrashed()->where('id_cliente',$id_cliente)->restore();
		$proceso = "RESTAURACION DE CLIENTE";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}

}
