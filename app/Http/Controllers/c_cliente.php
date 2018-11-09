<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class c_cliente extends Controller
{
    public function altacliente()
	{

        $municipios =municipio:: all();
        $usuarios =usuario:: all();
    return view ('proyecto.altacliente')
            ->with('municipios', $municipios)
            ->with('usuarios', $usuarios)
            ->with('idc',$idc);
    }
	public function guardacliente(Request $request)
	{   
	$nombre = $request->nombre;
    $apat = $request->apat;
    $amat = $request->amat;
    $empresa = $request->empresa;
    $telefono = $request->telefono;
    $direccion= $request->direccion;
	$municipio_id = $request->municipio_id;
    $cp = $request->cp;
    $usuario_id = $request->usuario_id;
	//no se resive el archivo
	 $this->validate($request,[
	     'id'=>'required|numeric',
         'nombre'=>'required|alpha',
         'apat'=>'required|alpha',
         'amat'=>'required|alpha',
         'empresa'=>'required|alpha',
         'telefono'=>'required|numeric|min:7',
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
        $clie = new cliente;
        $clie->archivo = $img2;
        $clie->id = $request->id;
        $clie->nombre = $request->nombre;
        $clie->apat = $request->apat;
        $clie->amat = $request->amat;
        $clie->empresa = $request->empresa;
        $clie->telefono = $request->telefono;
        $clie->cp = $request->cp;
        $clie->municipio_id = $request->municipio_id;
        $clie->usuario_id = $request->usuario_id;
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
        $clientes = cliente::orderBy('nombre', 'asc')->get();
        return view ('proyecto.reportecl')
        ->with ('clientes', $clientes);
    }
}
