<html>
   
   <head>
      <title>Vista Materias</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Vista Materias</h1>
      <?php
      if (isset($materiasAl) && $materiasAl != "" && $materiasAl != " "){
      echo ("Materias: ".$materiasAl);
      }
      else{
         echo("No tienes materias");
      }
      ?>
      <p class="fondoNormal"><a href="/dashboard">VOLVER A DASHBOARD</a></p>
   </body>

</html>