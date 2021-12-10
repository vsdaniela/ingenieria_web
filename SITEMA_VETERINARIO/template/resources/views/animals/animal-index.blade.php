@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ANIMALES</h4>
            @php
            echo date('l jS \of F Y h:i:s A');
            echo '<br>';    
            @endphp
          <a href="{{ route('animals.create')}}" class="btn btn-primary m-1" >Añadir animal</a>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>ID Animal</th>
                  <th>Especie</th>
                  <th>Nombres</th>
                  <th>Fecha nacimiento</th>
                  <th>Caracteristicas</th>
                  <th>Propietario</th>
                  <th colspan="3">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($animales as $animal)
                <tr>
                    <td>{{$animal->idAnimal}}</td>
                    <td>{{$animal->especie_animal}}</td>
                    <td>{{$animal->nombre_animal}}</td>
                    <td>{{$animal->fecha_nac_animal}}</td>
                    <td>{{$animal->caracteristicas_animal}}</td>
                    <td>{{$animal->dni_propietario}}</td>
                    <td>
                        <div class="d-flex">
                            <form action="{{ route('animals.destroy',$animal->idAnimal) }}" method="post">

                                
                                <a class="btn btn-warning" href="{{ route('animals.edit',$animal->idAnimal) }}" role="button">Editar</a>
                                {{ method_field('delete') }}
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
