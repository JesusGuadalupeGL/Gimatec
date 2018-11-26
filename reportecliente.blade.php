@extends('layout.head')
@section('contenido')
<div class="table-responsive">
<table class="table responsive table-sm table-dark">
    <tr>
        <td>ID</td>
		<td>Imagen</td>
        <td>Nombre</td>
        <td>Empresa</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>Operaciones</td>

    </tr>
    @foreach($clientes as $cl)
        <tr class="id">
            <td class="table-active">{{$cl->idcli}}</td>
			<td class="table-active"><img src="archivo/{{$cl->archivo}}" height="50px" whidth="50px"></td>
            <td class="table-primary">{{$cl->nombre}} {{$cl->apat}} {{$cl->amat}}</td>
            <td class="table-danger">{{$cl->empresa}}</td>
            <td class="table-warning">{{$cl->telefono}}</td>
			<td class="table-active">{{$cl->calle}} {{$cl->no_int}} {{$cl->no_ext}}, {{$cl->colonia}},{{$cl->idm}}</td>           
            
         <td>   @if($cl->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('ControlladorCliente@eliminac',['idcli'=>$cl->idcli])}}"> 
										Eliminar  
									</a>
									<a  class="btn btn-danger btn-md" href="{{URL::action('ControlladorCliente@modificacliente',['idcli'=>$cl->idcli])}}"> 
									Modificar 
								    </a>
										@else						
									<a class="btn btn-primary btn-md" href="{{URL::action('ControlladoCliente@restaurac',['idcli'=>$cl->idcli])}}"> 
										Restaurar  
									</a>
										@endif					
										@endforeach
										
   </td>
</table>
</div>
@stop