<html>
   
   <head>
      <title>Modificar Materias</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   
   <body>
      <h1>Modificar Materias</h1>
      <form action="/modificar/modifymateria" method="post">
        <p>Nombre nuevo de la materia: <input type="text" name="nombre" ></p>
        <p>Materia: <select name="materia">
             <?php foreach($materias as $materia):?>
               <p><?php echo"<option value='$materia->idmateria'>$materia->nombre</option>";?></p>
           <?php endforeach; ?>
        </select></p>
        <input type="submit" value="Cambiar" class="button">
       </form>
       
      <p class="fondoNormal"><a href="/manage">VOLVER A ADMINISTRAR</a></p>
   </body>

</html>