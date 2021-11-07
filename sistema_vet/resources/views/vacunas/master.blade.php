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
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <div class="container">
            <hr/>
            <hr/>
            @php
            echo date('l jS \of F Y h:i:s A');
            echo '<br>';    
            @endphp
          <a href="{{ route('vacunas.create')}}" class="btn btn-primary m-1" >Crear nueva</a>
          <hr/>
          <table id="laravel_crud" class="table">
              <thead>
              <th>Nombre de vacuna</th>
              <th>Fecha de vacunacion</th>
              <th>Descripcion de vacuna</th>
              <th colspan="3">Actions</th>
              </thead>
      
              @foreach($vacunas as $vacuna)
                  <tr id="row_{{$vacuna->id_vacuna}}">
                      <td>{{$vacuna->nombre_vacuna}}</td>
                      <td>{{$vacuna->fecha_vacuna}}</td>
                      <td>{{$vacuna->descripcion_vacuna}}</td>
                      <td>
                          <div class="d-flex">
                              <form action="{{ route('vacunas.destroy',[$vacuna->id_vacuna]) }}" method="POST">
                                  <a class="btn btn-warning" href="{{ route('vacunas.edit',[$vacuna->id_vacuna]) }}" role="button">Editar</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                                  <a href="javascript:void(0)" class="btn btn-danger m-1" id="button_ajax"  onclick="delete_ajax(12)" role="button">Eliminar AJAX</a>
                              </form>
                              
                          </div>
                      </td>
                  </tr>
      
              @endforeach
          </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src=”script.js” language=”Javascript”>
            $('#laravel_crud').DataTable();
            var token = $("meta[name='csrf-token']").attr("content");
            $(document).ready(function(){
                function delete_ajax(id_v) {
                    $.ajax({
                        url: "vacunas/eliminar_ajax/"+id_v,
                        type: 'POST',
                        data : {id_vacuna:id_v},
                        beforeSend: function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token',$('[name="_csrfToken"]').val());
                        },
                        success: function(data) {
                            $("#row_"+id).remove();
                            $("#laravel_crud").DataTable().ajax.reload();
                        },
                        dataType: 'json'    
                    });
                }
            });
        </script>
  </body>
  
</html>
