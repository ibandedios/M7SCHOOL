<html>
   
   <head>
      <title>Eliminar Materias</title>
      <link href="/src/templates/estilo.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Eliminar Materias</h1>
      <form action="/modificar/removemateria" method="post">
        <p>Curso: <select name="materia">
             <?php foreach($materias as $materia):?>
               <p><?php echo"<option value='$materia->idmateria'>$materia->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>
        <input type="submit" value="Borrar" class="button">
       </form>
       
      <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>

</html>