@extends('layout.head')
@section('contenido')
<div class="table-responsive">
<table class="table responsive table-sm table-dark">
    <tr>
        <td>ID</td>
		<td>Imagen</td>
        <td>Nombre</td>
        <td>A.Paterno</td>
        <td>A.Materno</td>
        <td>Empresa</td>
        <td>Telefono</td>
        <td>Calle</td>
		<td>Numero Interior</td>
		<td>Numero Exterior</td>
        <td>Colonia</td>
        <td>Municipios</td>
        <td>Operaciones</td>

    </tr>
    @foreach($clientes as $cl)
        <tr class="id">
            <td class="table-active">{{$cl->idcli}}</td>
			<td class="table-active"><img src="archivo/{{$cl->archivo}}" height="50px" whidth="50px"></td>
            <td class="table-primary">{{$cl->nombre}}</td>
            <td class="table-secondary">{{$cl->apat}}</td>
            <td class="table-success">{{$cl->amat}}</td>
            <td class="table-danger">{{$cl->empresa}}</td>
            <td class="table-warning">{{$cl->telefono}}</td>
			<td class="table-active">{{$cl->calle}}</td>
            <td class="table-primary">{{$cl->no_int}}</td>
            <td class="table-secondary">{{$cl->no_ext}}</td>
            <td class="table-info">{{$cl->colonia}}</td>
            <td class="table-active">{{$cl->ide}}</td>
            <td class="table-primary">{{$cl->idm}}</td>
            <td class="table-secondary">{{$cl->idu}}</td>
            
        </tr>
    @endforeach
</table>
</div>
@stop