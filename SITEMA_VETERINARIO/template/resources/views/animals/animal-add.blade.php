
@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="p-4 border-bottom bg-light">
          <h4 class="card-title mb-0">Añadir Animal</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('animals.store')}}" >
                <div class="mb-3 row">
                <label for="input" class="col-sm-2 col-form-label">Especie Animal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="especie_animal" id="especie_animal">
                </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputdesc" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre_animal" id="nombre_animal">
                    </div>
                </div>

                <div class="mb-3 row">
                <label for="inputdesc" class="col-sm-2 col-form-label">Fecha nacimiento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fecha_nac_animal" id="fecha_nac_animal">
                </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputdesc" class="col-sm-2 col-form-label">Caracteristicas</label>
                    <div class="col-sm-10">
                        <input type="wywyg" class="form-control" name="caracteristicas_animal" id="caracteristicas_animal">
                    </div>
                </div>
                <div class="mb-4 row">
                    <p>
                    Propietario:  
                    <select class="form-select" id="propietario_select" aria-label="Default select example">
                        <option selected></option>
                        @foreach($propietarios as $propietario)
                        <option value="{{$propietario->dni_propietario}}">{{$propietario->dni_propietario}}   <->   {{$propietario->nombres_prop}}</option>
                        @endforeach
                      </select>
                    </p>
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