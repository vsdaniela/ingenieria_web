@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="p-4 border-bottom bg-light">
          <h4 class="card-title mb-0">Añadir Propietario</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('pet-owners.store') }}" >
                <div class="mb-3 row">
                <label for="input" class="col-sm-2 col-form-label">DNI Propietario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dni_propietario" id="dni_propietario">
                </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputdesc" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombres_prop" id="nombres_prop">
                    </div>
                </div>

                <div class="mb-3 row">
                <label for="inputdesc" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="direccion_prop" id="direccion_prop">
                </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputdesc" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telefono_propietario" id="telefono_propietario">
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