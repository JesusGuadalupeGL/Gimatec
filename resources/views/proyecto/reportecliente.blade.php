@extends('layout.head')
@section('contenido')
<table class="table table-sm table-dark">
    <tr>
        <td>ID</td>
        <td>Logo</td>
        <td>Nombre</td>
        <td>A.Paterno</td>
        <td>A.Materno</td>
        <td>Empresa</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>CP</td>
        <td>Municipios</td>
        <td>Operaciones</td>

    </tr>
    @foreach($clientes as $cl)
        <tr class="id">
            <td class="table-active">{{$cl->idcli}}</td>
            <td class="table-primary">{{$cl->nombre}}</td>
            <td class="table-secondary">{{$cl->apat}}</td>
            <td class="table-success">{{$cl->amat}}</td>
            <td class="table-danger">{{$cl->empresa}}</td>
            <td class="table-warning">{{$cl->telefono}}</td>
            <td class="table-info">{{$cl->direccion}}</td>
            <td class="table-light">{{$cl->cp}}</td>
            <td class="table-active">{{$cl->ide}}</td>
            <td class="table-primary">{{$cl->idm}}</td>
            <td class="table-secondary">{{$cl->idu}}</td>
            
        </tr>
    @endforeach
</table>
@stop