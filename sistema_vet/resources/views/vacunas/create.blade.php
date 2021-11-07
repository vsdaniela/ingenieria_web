<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    
    <title>Clinica Veterinaria MEW</title>
  </head>
    <div class="container"> <div class=" text-center mt-5 ">
      <h1>Crear vacuna</h1>

      <form method="post" action="{{ route('vacunas.store') }}" >
      
        <div class="mb-3 row">
          @csrf
          <label for="input" class="col-sm-2 col-form-label">Nombre de vacuna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre_vacuna" id="nombre_vacuna">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputdesc" class="col-sm-2 col-form-label">Fecha de vacuna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fecha_vacuna" id="fecha_vacuna">
          </div>
          
        </div>

        <div class="mb-3 row">
          <label for="inputdesc" class="col-sm-2 col-form-label">Descripción de vacuna</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="descripcion_vacuna" id="descripcion_vacuna">
          </div>
        </div>
        
        <button type="submit" class="btn btn-default">Guardar</button>

      </form>
      <a href="{{ route('vacunas.index')}}" class="btn btn-warning m-1" >Regresar</a>

    </div>

    </html>
