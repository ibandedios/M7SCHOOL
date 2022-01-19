<html>
   
   <head>
      <title>Añadir Curso</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Añadir Curso</h1>
        <form action="addcursoact" method="post">
        <p>Nombre del curso:<input type="text" name="curso" ></p>

        <input type="submit" value="Añadir" class="button">
       </form>
       <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>
   

</html>