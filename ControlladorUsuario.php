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

class ControlladorUsuario extends Controller
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
        return view ('proyecto.altausuario');
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
         'nombre'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
         'apat'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
         'amat'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
		 'calle'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú,.]+$/'],
         'telefono'=>'required|numeric|min:10',
         'correo_usu'=>'required|email',
         'pass'=>'required',
		 'tipo'=>'required',
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
        $usu = new usuarios;
        $usu->archivo = $img2;
        $usu->nombre = $request->nombre;
        $usu->apat = $request->apat;
        $usu->amat = $request->amat;
        $usu->calle = $request->calle;
        $usu->telefono = $request->telefono;
        $usu->correo_usu = $request->correo_usu;
        $usu->pass = $request->pass;
        $usu->tipo = $request->tipo;
        $usu->activo = $request->activo;
        $usu->save();
        
        return redirect ('/head');
	  
	}
//REPORTE USUARIO
public function reporteusu() 
    {
        $usuarios = usuarios::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reporteusu')
        ->with ('usuarios', $usuarios);
    }


    public function eliminau($idu) 
    {
        usuarios::find($idu)->delete();
		    $proceso = "ELIMINAR CLIENTE";
			$mensaje = "El cliente ha sido eliminado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
            
    }
    public function modificausuario($idu)
	{
		$usuario = usuarios::where('idu','=',$idu)->get();
		
        
		return view('proyecto.modificausu')
								  ->with('usuario',$usuario[0]);
	}
	
	

	public function editacliente(Request $request)
	{
        $usu->nombre = $request->nombre;
        $usu->apat = $request->apat;
        $usu->amat = $request->amat;
        $usu->calle = $request->calle;
        $usu->telefono = $request->telefono;
        $usu->correo_usu = $request->correo_usu;
        $usu->pass = $request->pass;
        $usu->tipo = $request->tipo;
        $usu->activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
            'nombre'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
            'apat'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
            'amat'=>['required','regex:/^[A-Z][A-Z,a-z, ñ,á,é,í,ó,ú]+$/'],
            'calle'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú,.]+$/'],
            'telefono'=>'required|numeric|min:10',
            'correo_usu'=>'required|email',
            'pass'=>'required',
            'tipo'=>'required',
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
      $img2= 'sinfoto.png';
	 }
		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
         $usu =usuarioss::find($idu);
        
        $usu->nombre = $request->nombre;
        $usu->apat = $request->apat;
        $usu->amat = $request->amat;
        $usu->calle = $request->calle;
        $usu->telefono = $request->telefono;
        $usu->correo_usu = $request->correo_usu;
        $usu->pass = $request->pass;
        $usu->tipo = $request->tipo;
        $usu->activo = $request->activo;

			if($file!='')
			{
			$usu->archivo = $img2;
			}
			$usu->save();
		
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
