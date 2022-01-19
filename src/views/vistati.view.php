<html>
   
   <head>
      <title>Vista taskItems</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Vista Ejercicios</h1>
      <?php
      if (isset($strEjerc) && $strEjerc != "" && $strEjerc != " "){
      echo ("Ejercicios: ".$strEjerc);
      }
      else{
         echo("No tienes ejercicios con esa tarea");
      }
      ?>
      <p class="fondoNormal"><a href="/tareas">VOLVER A TAREAS</a></p>
   </body>

</html>