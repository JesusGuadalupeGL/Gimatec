@extends('layout.head')

@section('contenido')

<form action ="{{route('editacliente')}}" method = 'POST' enctype= 'multipart/form-data'>
{{csrf_field()}}


<div class='col-md-6'>
@if($errors->first('id')) 
    <i> {{ $errors->first('id') }} </i> 
    @endif
    Clave<input type = 'text' class='form-control' name = 'idcli' value="{{$cliente->idcli}}" readonly = 'readonly'>


<div class='col-md-6'>
Nombre<input type = 'text'  class='form-control' name = 'nombre' value="{{$cliente->nombre}}">
@if($errors->first('nombre')) 
<i> {{ $errors->first('nombre') }} </i> 
@endif
</div>

<div class='col-md-6'>
Apellido Paterno<input type = 'text'  class='form-control'name = 'apat' value="{{$cliente->apat}}">
@if($errors->first('apat')) 
<i> {{ $errors->first('apat') }} </i> 
@endif
</div>

<div class='col-md-6'>
Apellido Materno<input type = 'text' class='form-control' name = 'amat' value="{{$cliente->amat}}">
<br>
@if($errors->first('amat')) 
<i> {{ $errors->first('amat') }} </i> 
@endif
</div>

<div class='col-md-6'>
Empresa<input type = 'text' class='form-control' name = 'empresa' value="{{$cliente->empresa}}">
@if($errors->first('empresa')) 
<i> {{ $errors->first('empresa') }} </i> 
@endif
</div>


<div class='col-md-6'>
Telefono<input type ='text' class='form-control' name = 'telefono' value="{{$cliente->telefono}}">
@if($errors->first('telefono')) 
<i> {{ $errors->first('telefono') }} </i> 
@endif
</div>

<div class='col-md-6'>
Calle<input type ='text' class='form-control' name = 'calle' value="{{$cliente->calle}}">
@if($errors->first('calle')) 
<i> {{ $errors->first('calle') }} </i> 
@endif
</div>

<div class='col-md-6'>
Numero Interior<input type ='text' class='form-control' name = 'no_int' value="{{$cliente->no_int}}">
@if($errors->first('no_int')) 
<i> {{ $errors->first('no_int')}} </i> 
@endif
</div>

<div class='col-md-6'>
Numero Exterior<input type ='text' class='form-control' name = 'no_ext' value="{{$cliente->no_ext}}">
@if($errors->first('no_ext')) 
<i> {{ $errors->first('no_ext') }} </i> 
@endif
</div>


<div class='col-md-6'>
colonia<input type = 'text' class='form-control' name = 'colonia' value="{{$cliente->colonia}}">
@if($errors->first('colonia')) 
<i> {{ $errors->first('colonia') }} </i> 
@endif
</div>

<div class='col-md-6'>
Codigo Postal<input type = 'text' class='form-control' name= 'cp' value="{{$cliente->cp}}" alt='el codigo postal debe de ser de 5 digitos'>
@if($errors->first('cp')) 
<i> {{ $errors->first('cp') }} </i> 
@endif
</div>
<div class='col-md-6'>
Municipio<select class='form-control' name = 'idm'>
@foreach($demasmunicipios as $mun)
 <option value = '{{$mun->idm}}'>{{$mun->municipio}}</option>
 @endforeach
 </select>
 </div>
<div class='col-md-6'>              
Usuario<select class='form-control' name = 'idu'>
@foreach($demasusuarios as $usu)
 <option value = '{{$usu->idu}}'>{{$usu->nombre}}</option>
 @endforeach
</select>
</div>
<div class='col-md-6'> 
@if($errors->first('archivo')) 
<i> {{ $errors->first('archivo') }} </i> 
@endif 
</div>
<div class='col-md-6'> 
<br>
<img src = "{{ asset('archivo/'.$cliente->archivo) }}" height =150>

Selecionar Logo <input type = 'file' class='form-control' name= 'archivo'>
</div>
<br>
<button class="btn btn-primary" type = 'submit'>Guardar</button>
</form>
@stop
