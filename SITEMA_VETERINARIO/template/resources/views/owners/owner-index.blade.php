@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">PROPIETARIOS</h4>
          <a href="{{ route('pet-owners.create')}}" class="btn btn-primary m-1" >Añadir propietario</a>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>DNI</th>
                  <th>Nombres</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th colspan="3">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($propietarios as $propietario)
                <tr>
                    <td>{{$propietario->dni_propietario}}</td>
                    <td>{{$propietario->nombres_prop}}</td>
                    <td>{{$propietario->direccion_prop}}</td>
                    <td>{{$propietario->telefono_prop}}</td>
                    <td>
                        <div class="d-flex">
                            <form action="{{ route('pet-owners.DELETE',$propietario->dni_propietario) }}" method="post">
                              {{ method_field('PUT') }}
                                <a class="btn btn-warning" href="{{ route('pet-owners.edit',$propietario->dni_propietario) }}" role="button">Editar</a>

                                <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush