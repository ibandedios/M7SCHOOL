<html>
   
   <head>
      <title>Register</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Register</h1>
        <form action="/regaction/register" method="post">
        <p>Nombre de usuario: <input type="text" name="user" ></p>
        <p>Email: <input type="text" name="email" ></p>
        <p>Tipo: <select name="tipo">
         <option value="profesor">Profesor</option>
         <option value="alumnos">Alumno</option>
         </select>
        </p>
        <p>Curso: <select name="curso">
             <?php foreach($cursos as $curso):?>
               <p><?php echo"<option value='$curso->id'>$curso->nombre</option>";?></p>
           <?php endforeach; ?>
        </select>(Para alumnos)</p>
        <p>Contraseña:<input type="password" name="pass"></p>
        <input type="submit" value="Enviar" class="button">
       </form>
   </body>

</html>