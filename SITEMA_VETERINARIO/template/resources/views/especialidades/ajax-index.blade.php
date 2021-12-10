
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SISTEMA VET</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
      <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
      <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

      <!-- plugin css -->
      {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
      {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
    </head>
    <body data-base-url="{{url('/')}}">
      
      <div class="container">
        <br>
        <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Especialidades</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              {{ csrf_field() }}
              <table id="editable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre de Especialidad</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{ $row->idEspecialidad }}</td>
                    <td>{{ $row->nombre_Especialidadcol}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>

  
<script>
    $(document).ready(function(){
       
      $.ajaxSetup({
        headers:{
          'X-CSRF-Token' : $("input[name=_token]").val()
        }
      });
    
      $('#editable').Tabledit({
        
        url:'{{route("especialidades.action")}}',
        dataType:"json",
        type: 'POST',
        columns:{
          identifier:[0, 'idEspecialidad'],
          editable:[[1, 'nombre_Especialidadcol']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
            console.log("delete table");
            $('#'+data.id).remove();
          }
        }
      });
    
    });  
    </script>
  