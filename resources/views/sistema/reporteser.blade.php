@extends('layout.head')
@section('contenido')
<table class="table table-sm table-dark">
    <tr>
        <td>ID</td>
        <td>Fecha</td>
        <td>Total</td>
        <td>Tipo de Servicio</td>
        <td>Usuario</td>
        <td>Cliente</td>
       

    </tr>
    @foreach($servicios as $ser)
        <tr class="id">
            <td class="table-active">{{$ser->idserv}}</td>
            <td class="table-primary">{{$ser->fecha}}</td>
            <td class="table-secondary">{{$ser->total}}</td>
            <td class="table-success">{{$ser->tiposer}}</td>
            <td class="table-danger">{{$ser->idu}}</td>
            <td class="table-warning">{{$ser->idcli}}</td>
          
            
        </tr>
    @endforeach
</table>
@stop