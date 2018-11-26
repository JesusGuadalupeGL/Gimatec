@extends('layout.head')
@section('contenido')
<div class="table-responsive">
<table class="table table-sm table-dark">
    <tr>
        <td>ID</td>
		<td>Imagen</td>
        <td>Nombre</td>
        <td>Calle</td>
        <td>Telefono</td>
        <td>Correo</td>
        <td>Tipo</td>
        <td>Activo</td>
        <td>Operaciones</td>

    </tr>
    @foreach($usuarios as $usu)
        <tr class="id">
            <td class="table-active">{{$usu->idu}}</td>
			<td class="table-active"><img src="archivo/{{$usu->archivo}}" height="50px" whidth="50px"></td>
            <td class="table-primary">{{$usu->nombre}} {{$usu->apat}} {{$usu->amat}}</td>
            <td class="table-danger">{{$usu->calle}}</td>
            <td class="table-warning">{{$usu->telefono}}</td>
            <td class="table-info">{{$usu->correo_usu}}</td>
            <td class="table-active">{{$usu->tipo}}</td>
            <td class="table-primary">{{$usu->activo}}</td>
            <td>   @if($usu->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('ControlladorUsuario@eliminau',['idu'=>$usu->idu])}}"> 
										Eliminar  
									</a>
									<a  class="btn btn-danger btn-md" href="{{URL::action('ControlladorUsuario@modificausuario',['idu'=>$usu->idu])}}"> 
									Modificar 
								    </a>
										@else						
									<a class="btn btn-primary btn-md" href="{{URL::action('ControlladorUusuario@restaurau',['idu'=>$usu->idu])}}"> 
										Restaurar  
									</a>
										@endif					
										@endforeach
										
   </td>

            
        </tr>
    
</table>
</div>
@stop