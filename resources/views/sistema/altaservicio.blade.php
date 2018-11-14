@extends('layout.head')

@section('contenido')

    <h1>Alta de servicios</h1>
        <form action ="{{route('altaservicio')}}" method = 'POST' enctype='multipart/form-data'>
        {{csrf_field()}}
 
        <div class='col-md-6'>
        @if($errors->first('fecha')) 
        <i> {{ $errors->first('fecha') }} </i> 
        @endif
        Fecha<input type = 'date' class='form-control' name = 'fecha' value="{{old('fecha')}}">
        </div>

        <div class='col-md-6'>
        @if($errors->first('total')) 
        <i> {{ $errors->first('total') }} </i> 
        @endif
        Total<input type ='total' class='form-control' name = 'total' value="{{old('total')}}">
        </div>

        <div class='col-md-6'>
		 @if($errors->first('tiposer')) 
        <i> {{ $errors->first('tiposer') }} </i> 
        @endif
        Tipo de servicio<input type = 'text' class='form-control' name = 'tiposer' value="{{old('tiposer')}}">
        </div>
		<div class='col-md-6'>
		Clientes<select class='form-control' name = 'idcli'>
       @foreach($clientes as $cli)
          <option value = '{{$cli->idcli}}'>{{$cli->empresa}}</option>
        @endforeach
          </select>
         </div>
		
         <div class='col-md-6'>
        Usuario<select class='form-control' name = 'idu'>
        @foreach($usuarios as $us)
       <option value = '{{$us->idu}}'>{{$us->nombre}}</option>
        @endforeach
        </select>
        </div>
        <br>
        <button class="btn btn-primary" type = 'submit'>Guardar</button>
        
        </form>
        @stop