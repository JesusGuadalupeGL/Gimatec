
@extends('layout.head')

@section('contenido')
<html>
<body>


    <h1>Servicio Programado</h1>
        <form action ="guardadetalle" method = 'POST' enctype='multipart/form-data'>
        {{csrf_field()}}
        
        <div class='col-md-6'>
        @if($errors->first('descripcion')) 
        <i> {{ $errors->first('descripcion') }} </i> 
        @endif
        Descripción<input type = 'text'class='form-control' name = 'descripcion' value="{{old('descripcion')}}">
        </div>
		<div class='col-md-6'>
		@if($errors->first('cantidad')) 
        <i> {{ $errors->first('cantidad') }} </i> 
        @endif
        Cantidad<input type = 'text' class='form-control'  name = 'cantidad' value="{{old('cantidad')}}">
        </div>
		
        <div class='col-md-6'>
		@if($errors->first('subtotal')) 
        <i> {{ $errors->first('subtotal') }} </i> 
        @endif
        Subtotal<input type = 'text' class='form-control' name = 'subtotal' value="{{old('subtotal')}}">
        </div>

        <div class='col-md-6'>
		Servicios<select class='form-control' name = 'idserv'>
        @foreach($servicios as $ser)
          <option value = '{{$ser->idserv}}'>{{$ser->tiposer}} :: {{$ser->fecha}}</option>
        @endforeach
          </select>
         </div>
		
        <div class='col-md-6'>
        Mantenimiento<select class='form-control' name = 'idmant'>
        @foreach($mantenimientos as $maa)
        <option value = '{{$maa->idmant}}'>{{$maa->descripcion}} :: {{$maa->fecha}}</option>
        @endforeach
        </select>
        </div>
        <br>

        <button class="btn btn-primary" type = 'submit'>Guardar</button>
        </form>
   </body>
   </html>
   @stop