<html>
   
   <head>
      <title>Dashboard</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   <body>
      <h1>Dashboard</h1>
      <div class="escuela"><h1>SCHOOL</h1></div>
      <p class="fondoNormal">Fecha última session: <?php
      //cookie de la fecha de la ultima session
      if(isset($_COOKIE['fechasession'])){
         echo $_COOKIE['fechasession'];
      }
      else{
         echo ("No hay ultima sesion");
         
      }
      ?></p>
      <p class="fondoNormal">Muy buenas, <?php
      //nombre de la session
      echo $_SESSION['nombre'];
      
      ?></p>
      <p class="fondoNormal">Tu email es:
         <?php 
            echo $_SESSION['email'];
      ?>
      
      </p>
      <?php 
      if(isset($tipo)){
         if($tipo == "alumnos"){
               
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/materias'>MATERIAS</p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
         else if($tipo == "profesor"){
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/materiaspr'>MATERIAS</p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
         else if($tipo == "admins"){
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/manage'>ADMINISTRAR</a></p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
      }
      else{
         if($_COOKIE['tipo'] == "alumnos"){
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/materias'>MATERIAS</p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
         else if($_COOKIE['tipo'] == "profesor"){
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/materiaspr'>MATERIAS</p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
         else if($_COOKIE['tipo'] == "admins"){
            echo("<p class='fondoNormal'><a href='/tareas'>VISUALIZAR TAREAS</a></p>
            <p class='fondoNormal'><a href='/manage'>ADMINISTRAR</a></p>
            <p class='fondoNormal'><a href='/index'>HOME</a></p>
            <p class='fondoNormal'><a href='/clear'>CERRAR SESION</p>");
         }
      }
            
      ?>
   </body>

</html>