@extends('layout.head')
@section('contenido')
<form action="{{route('guardamaquina')}}" method='POST' enctype='multipart/form-data' class="needs-validation">
{{csrf_field()}}
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">Nombre de Maquina</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Maquina" name="nombre" value="{{old('nombre')}}" required>
        @if($errors->first('nombre'))
        <i>{{$errors->first('nombre')}}</i>
        @endif
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Archivo</label>
      <input type="file" class="form-control" id="validationTooltip02" placeholder="Archivo" name="archivo" value="{{old('archivo')}}" required>
      @if($errors->first('archivo'))
        <i>{{$errors->first('archivo')}}</i>
        @endif
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Descripcion</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Descripcion" name="descripcion" value="{{old('descripcion')}}" required>
      <div class="valid-tooltip">
      @if($errors->first('archivo'))
        <i>{{$errors->first('archivo')}}</i>
        @endif
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Precio</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Precio" name="precio" value="{{old('precio')}}" required>
      <div class="valid-tooltip">
      @if($errors->first('precio'))
        <i>{{$errors->first('precio')}}</i>
        @endif
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Stock</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Stock" name="stock" value="{{old('stock')}}" required>
      <div class="valid-tooltip">
      @if($errors->first('stock'))
        <i>{{$errors->first('stock')}}</i>
        @endif
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Categoria</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Categoria" name="categoria" value="{{old('categoria')}}" required>
      <div class="valid-tooltip">
      @if($errors->first('categoria'))
        <i>{{$errors->first('categoria')}}</i>
        @endif
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Existencias</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Existentes" name="existencias" value="{{old('existencias')}}" required>
      <div class="valid-tooltip">
      @if($errors->first('existencias'))
        <i>{{$errors->first('existencias')}}</i>
        @endif
      </div>
    </div>
    <div class="col-md-4 mb-3">
      

      
       
       
      </div>
    </div>
  </div>
  
  
  <button class="btn btn-primary" type="submit">Enviar</button>
</form>
@stop