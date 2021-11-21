<!doctype html>
<html lang="en">
  <head>
    <title>Mensaje recibido</title>
  </head>
    <body>
        CONTENIDO DE FORMULARIO
        <p> Has recibido este mensaje del formulario de Laravel: </p>
        <br>
        <p> Los datos que mandaste son, Correo:  {{$cp['correo']}}</p>
        <p> Nombres: {{$cp['nombre']}}</p>
        <p> Mensaje: {{$cp['mensaje']}}</p>
    </body>
  
</html>