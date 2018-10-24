@extends('layout.head')
@section('contenido')
<form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">Nombre de Maquina</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Maquina" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Archivo</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Archivo" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Descripcion</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Descripcion" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Precio</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Precio" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Stock</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Stock" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Categoria</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Categoria" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Existencias</label>
      <input type="text" class="form-control" id="validationTooltip02" placeholder="Existentes" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      

      
       
       
      </div>
    </div>
  </div>
  
  
  <button class="btn btn-primary" type="submit">Enviar</button>
</form>
@stop