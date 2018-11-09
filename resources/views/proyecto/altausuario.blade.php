@extends('layout.head')

@section('contenido')

<h1> Alta de usuario</h1>
<form action ="{{route('guardausuario')}}" method = 'POST' enctype= 'multipart/form-data'>
{{csrf_field()}}

<div class='col-md-6'>
    Nombre<input type = 'text' class='form-control' name = 'nombre' value="{{old('nombre')}}">
    @if($errors->first('nombre')) 
    <i> {{ $errors->first('nombre') }} </i> 
    @endif
</div>

<div class='col-md-6'>
@if($errors->first('apat')) 
<i> {{ $errors->first('apat') }} </i> 
@endif	<br>
Apellido Paterno<input type = 'text' class='form-control' name = 'apat' value="{{old('apat')}}">
</div>

<div class='col-md-6'>
@if($errors->first('amat')) 
<i> {{ $errors->first('amat') }} </i> 
@endif	<br>
Apellido Materno<input type = 'text' class='form-control' name = 'amat' value="{{old('amat')}}">
</div>

<div class='col-md-6'>
@if($errors->first('calle')) 
<i> {{ $errors->first('calle') }} </i> 
@endif	<br>
Calle<input type = 'text'class='form-control' name = 'calle' value="{{old('calle')}}">
</div>
<div class='col-md-6'>
@if($errors->first('telefono')) 
<i> {{ $errors->first('telefono') }} </i> 
@endif	<br>
Telefono<input type = 'text' class='form-control' name = 'telefono' value="{{old('telefono')}}">
</div>
<div class='col-md-6'>
@if($errors->first('correo_usu')) 
<i> {{ $errors->first('correo_usu') }} </i> 
@endif	<br>
Correo<input type ='text'class='form-control' name = 'correo_usu' value="{{old('correo_usu')}}">
</div>
<div class='col-md-6'>
@if($errors->first('pass')) 
<i> {{ $errors->first('pass') }} </i> 
@endif	<br>
Contraseña<input type = 'password'  class='form-control'name= 'pass' value="{{old('pass')}}">
</div>
<div class='col-md-6'>
Tipo<select class='form-control' name = 'tipo'>
<option value= 'admin'>Admin</option>
<option value='usuario'>Usuario</option>


                  </select></div>
                  <div class='col-md-6'>
Activo<select class='form-control' name = 'activo'>
<option value= 1>si</option>
<option value=0>no</option>
                  </select>
</div>
<div class='col-md-6'>
@if($errors->first('archivo')) 
<i> {{ $errors->first('archivo') }} </i> 
@endif	<br>
<br>
Selecionar Foto <input  class='form-control' type = 'file' name= 'archivo'>
</div>
<br>
<button class="btn btn-primary" type = 'submit'>Guardar</button>
</form>
@stop





