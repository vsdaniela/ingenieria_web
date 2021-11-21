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
    <!--Section: Contact v.2-->
<section class="mb-4">


    <div class="card" style="width: 60rem;">
        <div class="card-body">
          <h5 class="card-title">Formulario</h5>
          <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form method="post" action="/forms" >
      
                    <div class="mb-3 row">
                      @csrf
                      <label for="input" class="col-sm-2 col-form-label">Tus nombres</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" id="nombre">
                      </div>
                    </div>
            
                    <div class="mb-3 row">
                      <label for="inputdesc" class="col-sm-2 col-form-label">Tu correo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="correo" id="correo">
                      </div>
                      
                    </div>
            
                    <div class="mb-3 row">
                      <label for="inputdesc" class="col-sm-2 col-form-label">Mensaje</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="mensaje" id="mensaje">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Guardar</button>
            
                  </form>
            </div>
        </div>
        </div>
    </div>

    

</section>
<!--Section: Contact v.2-->
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