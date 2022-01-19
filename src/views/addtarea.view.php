<html>
   
   <head>
      <title>Añadir tarea</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Añadir Tarea</h1>
        <form action="addtareaact" method="post">
        <p>Nombre de tarea:<input type="text" name="nomTarea" ></p>
        <input type="submit" value="Añadir" class="button">
       </form>
       <p class="fondoNormal"><a href="/tareas">VOLVER A TAREAS</a></p>
   </body>
   

</html>