@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="p-4 border-bottom bg-light">
          <h4 class="card-title mb-0">Editar Propietario</h4>
        </div>
        <div class="card-body">
        <form action="{{ route('pet-owners.update', $propietario->dni_propietario) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <div class="mb-3 row">
            <label for="input" class="col-sm-2 col-form-label">DNI Propietario</label>
            <div class="col-sm-10">
                <input type="text" name= "dni_propietario" value="{{ $propietario->dni_propietario }}" class="form-control">
            </div>
            </div>
            <div class="mb-3 row">
            <label for="inputdesc" class="col-sm-2 col-form-label">Nombres</label>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='nombres_prop'>
                            <input type='text' name= "nombres_prop" value ="{{ $propietario->nombres_prop}}" class="form-control"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
            <label for="inputdesc" class="col-sm-2 col-form-label">Direccion</label>
            <div class="col-sm-10">
                <input type="text" name= "direccion_prop" value="{{ $propietario->direccion_prop}}" class="form-control" id="direccion_prop">
            </div>
            </div>
            <div class="mb-3 row">
                <label for="inputdesc" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                <input type="text" name= "telefono_propietario" value="{{ $propietario->telefono_propietario }}" class="form-control" id="telefono_propietario">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
</div>
@endsection

@push('plugin-scripts')
@endpush
@push('custom-scripts')
@endpush