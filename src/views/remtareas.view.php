<html>
   
   <head>
      <title>Borrar tarea</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Remove Task</h1>
        <form action="/remtareaact" method="post">
        <p>Nombre de tarea:<input type="text" name="remTarea" ></p>
        <input type="submit" value="Eliminar" class="button">
       </form>
       <p class="fondoNormal"><a href="/tareas">VOLVER A TAREAS</a></p>
   </body>

</html>