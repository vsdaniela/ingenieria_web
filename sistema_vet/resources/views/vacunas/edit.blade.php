@extends('layouts.master')

@section('title', 'Editar vacuna')

    @section('content')
    <form action="{{ route('vacunas.update', $vacuna->id_vacuna) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        <div class="mb-3 row">
          <label for="input" class="col-sm-2 col-form-label">Nombre de vacuna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre_vacuna">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputdesc" class="col-sm-2 col-form-label">Fecha de vacuna</label>
              <div class='col-sm-6'>
                  <div class="form-group">
                      <div class='input-group date' id='fecha_vacuna'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
              </div>
        </div>

        <div class="mb-3 row">
          <label for="inputdesc" class="col-sm-2 col-form-label">Descripción de vacuna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="descripcion_vacuna">
          </div>
        </div>

        <button type="submit" class="btn btn-default">Guardar</button>

      </form>
    @endsection