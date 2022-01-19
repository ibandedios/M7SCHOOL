<html>
   
   <head>
      <title>Administrar</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      
      <h1>Administrar</h1>
      <table>
      <caption>Materias</caption>
      <tr><td>ID MATERIA</td><td>NOMBRE</td><td>PROFESOR ID</td><td>CURSO ID</td></tr>
      <?php foreach($materias as $materia):?>
         
               <?php echo"<tr><td>$materia->idmateria</td><td>$materia->nombre
               </td><td>$materia->profesor_id</td><td>$materia->curso_id</td></tr>";?>
           <?php endforeach; ?>
      </table>
      <p class="fondoNormal"><a href="/addmateria">CREAR MATERIA</a></p>
      <p class="fondoNormal"><a href="/delmateria">BORRAR MATERIA</a></p>
      <p class="fondoNormal"><a href="/modmateria">MODIFICAR MATERIA</a></p>

      
      <table>
      <caption>Alumnos</caption>
      <tr><td>EMAIL</td><td>NOMBRE</td><td>CONTRASEÑA</td><td>CURSO ID</td></tr>
      <?php foreach($alumnos as $alumno):?>
         
               <?php echo"<tr><td>$alumno->email</td><td>$alumno->nombre
               </td><td>$alumno->passwd</td><td>$alumno->curso_id</td></tr>";?>
           <?php endforeach; ?>
      </table>
      <br>
      <table>
      <caption>Profesores</caption>
      <tr><td>EMAIL</td><td>NOMBRE</td><td>CONTRASEÑA</td></tr>
      <?php foreach($profesores as $profesor):?>
         
               <?php echo"<tr><td>$profesor->email</td><td>$profesor->nombre
               </td><td>$profesor->passwd</td></tr>";?>
           <?php endforeach; ?>
      </table>

      <p class="fondoNormal"><a href="register">AÑADIR USUARIO</a></p>
      <p class="fondoNormal"><a href="/moduser">MODIFICAR USUARIO</a></p>

      <table>
      <caption>Cursos</caption>
      <tr><td>ID</td><td>NOMBRE</td></tr>
      <?php foreach($cursos as $curso):?>
               <?php echo"<tr><td>$curso->id</td><td>$curso->nombre</td></tr>";?>
           <?php endforeach; ?>
      </table>



      <p class="fondoNormal"><a href="/addcurso">CREAR CURSO</a></p>
      <p class="fondoNormal"><a href="/delcurso">BORRAR CURSO</a></p>
      <p class="fondoNormal"><a href="/modcurso">MODIFICAR CURSO</a></p>
      <p class="fondoNormal"><a href="/dashboard">PAGINA INICIAL</a></p>
   </body>

</html>