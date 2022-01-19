<html>
   
   <head>
      <title>Dashboard</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Dashboard/Tareas</h1>
      <?php
      if (isset($tareas)){
         if($tareas != "" && sizeof($tareas) != 0){
         $i = 0;
         echo("Tareas: ");
         while($i < sizeof($tareas)){
            echo($tareas[$i].", ");
            $i++;
         }
      }
   else{
      echo("No tienes tareas creadas");
   }
         
      }
      else if (isset($_COOKIE['tareas'])){
         echo("SEXO");
      echo ("Tareas: ".$_COOKIE['tareas']);
      }
      else{
         echo("No tienes tareas creadas");
      }
      ?>
      <p class="fondoNormal"><a href="/addtarea">AÑADIR TAREA</a></p>
      <p class="fondoNormal"><a href="/remtarea">BORRAR TAREA</a></p>
      <p class="fondoNormal"><a href="/addtaskitem">AÑADIR EJERCICIO A TAREA</a></p>
      <p class="fondoNormal"><a href="/formti">VER EJERCICIOS</a></p>
      <p class="fondoNormal"><a href="/dashboard">PAGINA INICIAL</a></p>
   </body>

</html>