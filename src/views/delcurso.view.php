<html>
   
   <head>
      <title>Eliminar Cursos</title>
      <link href="/src/templates/estilo.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Elminar Cursos</h1>
      <form action="/modificar/removecurso" method="post">
        <p>Curso: <select name="curso">
             <?php foreach($cursos as $curso):?>
               <p><?php echo"<option value='$curso->id'>$curso->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>
        <input type="submit" value="Borrar" class="button">
       </form>
       
      <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>

</html>