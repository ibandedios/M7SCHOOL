<html>
   
   <head>
      <title>Añadir tarea</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Add Task Item</h1>
        <form action="/additemaction" method="post">
        <p>Nombre de tarea:<input type="text" name="nomTarea" ></p>
        <p>Nombre de item:<input type="text" name="nomItem" ></p>
        <input type="submit" value="Añadir" class="button">
       </form>
       <p class="fondoNormal"><a href="/tareas">VOLVER A TAREAS</a></p>
   </body>

</html>