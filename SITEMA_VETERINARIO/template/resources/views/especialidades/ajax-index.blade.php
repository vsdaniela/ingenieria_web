<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Table Edit Delete Mysql Data using Tabledit Plugin in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  </head>
  <style type="text/css">
  	div#links{
  		float:left;
  	}
  	div#menu{
  		float:right;
  	}
    div#menu2{
  		float:left;
  	}
  	div#credits{
  		clear:both;
  	}
  </style>
<body>
  <div class="container">
    <div class="panel-body">
      <h4 class="title mb-0">ESPECIALIDADES</h4>
          <div class="card">
            <div class="card-body">
              @php
                echo date('l jS \of F Y h:i:s A');
                echo '<br>';    
              @endphp
              <hr>
              <div id="menu" >
                <div class="card text-black" style="max-width: 30rem;">
                        <div class="card-body">
                                <form method="post" action="" >
                                      <div class="form-group">
                                        <label for="nombre_esp">Nombre Especialidad</label>
                                        <input type="text" class="form-control text-justify" id="nombre_esp"></div>
                                        <button type="submit" class="btn btn-primary">
                                          Añadir
                                        </button>
                                      </div>
                                </form>                                    
                      </div>
                  </div>
                </div>
                <div class="card" style="width: 80rem;" >
                    <div class="card-body">
                            <div class="table-responsive" >
                                {{ csrf_field() }}
                                <table id="editable" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nombre de Especialidad</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                      <td>{{ $row->idEspecialidad }}</td>
                                      <td>{{ $row->nombre_especialidad}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                      </div>
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
        
        url:'{{route("tabledit.action")}}',
        dataType:"json",
        columns:{
          identifier:[0, 'idEspecialidad'],
          editable:[[1, 'nombre_especialidad']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
            console.log("delete table");
            $('#'+data.idEspecialidad).remove();
          }
        }
      });
    
    });  
    </script>
  