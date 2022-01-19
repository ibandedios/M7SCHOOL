<html>
   
   <head>
      <title>Vista Cursos</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Vista Cursos</h1>
      <form action="/modificar/modifycurso" method="post">
        <p>Nombre nuevo del curso: <input type="text" name="nombre" ></p>
        <p>Curso: <select name="curso">
             <?php foreach($cursos as $curso):?>
               <p><?php echo"<option value='$curso->id'>$curso->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>
        <input type="submit" value="Cambiar" class="button">
       </form>
       
      <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>

</html>