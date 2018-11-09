@extends('layout.head')
@section('contenido')
<table class="table table-sm table-dark">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>A.Paterno</td>
        <td>A.Materno</td>
        <td>Calle</td>
        <td>Telefono</td>
        <td>Correo</td>
        <td>Contraseña</td>
        <td>Tipo</td>
        <td>Activo</td>

    </tr>
    @foreach($usuarios as $usu)
        <tr class="id">
            <td class="table-active">{{$usu->idu}}</td>
            <td class="table-primary">{{$usu->nombre}}</td>
            <td class="table-secondary">{{$usu->apat}}</td>
            <td class="table-success">{{$usu->amat}}</td>
            <td class="table-danger">{{$usu->calle}}</td>
            <td class="table-warning">{{$usu->telefono}}</td>
            <td class="table-info">{{$usu->correo_usu}}</td>
            <td class="table-light">{{$usu->pass}}</td>
            <td class="table-active">{{$usu->tipo}}</td>
            <td class="table-primary">{{$usu->activo}}</td>
            
            
        </tr>
    @endforeach
</table>
@stop