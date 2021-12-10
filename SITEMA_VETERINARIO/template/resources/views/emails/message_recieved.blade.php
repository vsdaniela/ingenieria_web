<!doctype html>
<html lang="en">
  <head>
    <title>Mensaje recibido</title>
  </head>
    <body>
        UN NUEVO PROPIETARIO SE AGREGÓ
        <p> Has recibido este mensaje del formulario de creacion de Laravel: </p>
        <br>
        <p> Los datos del nuevo propietario son: </p>
        <p> DNI PROPIETARIO: {{$cp['dni_propietario']}}</p>
        <p> NOMBRES Y APELLIDOS: {{$cp['nombres_prop']}}</p>
        <p> DOMICILIO: {{$cp['direccion_prop']}}</p>
        <p> TELEFONO : {{$cp['telefono_propietario']}}</p>
    </body>
  
</html>