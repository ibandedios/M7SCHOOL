<html>
   
   <head>
      <title>Login</title>
      <link href="<?php root();?>/public/css/style.css" type="text/css" rel="stylesheet">
   </head>
   
   
   <body>
      
      <?php
      //<?<php<h1><?=$nom;</h1>
      //si esta creada la cookie con los datos, te manda directamente al dashboard
      if (isset($_COOKIE['datosEmail'])){
         //Antes, te recoge la fecha de session ya que no pasa por el logaction 
         setcookie("fechasession",$_COOKIE['fechaultimases'],0,"/","localhost");
         setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
         return view('dashboard');
         
      }
      ?>
       <form action="/logaction/login" method="post">
        <p>Email:<input type="email" name="email"></p>
        <p>Contraseña:<input type="password" name="pass" ></p>
        <input type="checkbox" value="1" name="session" height="10px" width="10px">Deseas guardar los datos de sesion?</input>
        <input type="submit" value="Enviar" class="button">
       </form>
   </body>

</html>