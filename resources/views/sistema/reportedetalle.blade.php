@extends('layout.head')
@section('contenido')
<table class="table table-sm table-dark">
    <tr>
        <td>Clave</td>
        <td>Decripcion</td>
        <td>Cantidad</td>
        <td>Subtotal</td>
        <td>Operaciones</td>
 </tr>
    @foreach($detalles as $dell)
        <tr class="id">
            <td class="table-active">{{$dell->iddser}}</td>
            <td class="table-primary">{{$dell->descripcion}}</td>
            <td class="table-secondary">{{$dell->cantidad}}</td>
            <td class="table-success">{{$dell->subtotal}}</td>
            <td class="table-danger">{{$dell->operaciones}}</td>
          
            
            
        </tr>
    @endforeach
</table>


@stop