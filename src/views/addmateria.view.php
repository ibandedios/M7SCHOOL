<html>
   
   <head>
      <title>Añadir Materia</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Añadir Materia</h1>
        <form action="addmateriaact" method="post">
        <p>Nombre de materia:<input type="text" name="materia" ></p>

        <p>Profesor: <select name="profesor">
             <?php foreach($profesores as $profesor):?>
               <p><?php echo"<option value='$profesor->email'>$profesor->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>

       <p>Curso: <select name="curso">
             <?php foreach($cursos as $curso):?>
               <p><?php echo"<option value='$curso->id'>$curso->nombre</option>";?></p>
           <?php endforeach; ?>
           </select></p>
        <input type="submit" value="Crear" class="button">
       </form>
       <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>
   

</html>