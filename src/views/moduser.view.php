<html>
   
   <head>
      <title>Modificar Usuarios</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Modificar Usuarios</h1>
      <form action="/modificar/modifyuser" method="post">
        <p>Nombre nuevo del usuario: <input type="text" name="nombre" ></p>
        <p>Usuario: <select name="email">
             <?php foreach($alumnos as $alumno):?>
               <p><?php echo"<option value='$alumno->email'>$alumno->nombre</option>";?></p>
           <?php endforeach; ?>
           <?php foreach($profesores as $profesor):?>
               <p><?php echo"<option value='$profesor->email'>$profesor->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>
        <input type="submit" value="Cambiar" class="button">
       </form>
       
      <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>

</html>