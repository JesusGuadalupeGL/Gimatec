@extends('layout.head')
@section('contenido')
<table class="table table-sm table-dark">
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>Imagen</td>
        <td>Descripcion</td>
        <td>Precio</td>
        <td>Stock</td>
        <td>Categoria</td>
        <td>Existencia</td>
    </tr>
    @foreach($maquinas as $maq)
        <tr class="id">
            <td class="table-active">{{$maq->idmac}}</td>
            <td class="table-primary">{{$maq->nombre}}</td>
            <td class="table-secondary">{{$maq->archivo}}</td>
            <td class="table-success">{{$maq->descripcion}}</td>
            <td class="table-danger">{{$maq->precio}}</td>
            <td class="table-warning">{{$maq->stock}}</td>
            <td class="table-info">{{$maq->categoria}}</td>
            <td class="table-light">{{$maq->existencias}}</td>
            
        </tr>
    @endforeach
</table>
@stop