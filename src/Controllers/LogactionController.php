<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;
use App\Database\Connection;


class LogactionController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function login(){

            $email=filter_input(INPUT_POST, 'email');
            $passwd=filter_input(INPUT_POST, 'pass');
            $session=filter_input(INPUT_POST, 'session');
    
    //meter condicional if para comprobar que me han enviado datos con isset($_POST)
    //si se cumple el if hago el try
    if($passwd == "" || $passwd == " "){
        echo("Login mal puesto");
        $this->redirectTo("/");
    }
    if(isset($_POST['email']) and ($_POST['pass'])){
    try{ 
        //preparem sentència+
        //$qb = Registry::get('database');
        //$sql = "SELECT * FROM alumnos WHERE email=:email LIMIT 1";
        //$stmt=$qb->query($sql);
        //$stmt->execute([':email'=>$email]);
        //$count=$stmt->rowCount();
        $alumnos = Registry::get('database')->tipoAlumno($email);
        $profesores = Registry::get('database')->tipoProfesor($email);
        $admins = Registry::get('database')->tipoAdmin($email);
        foreach($alumnos as $alumno){
            $passwdb="";
            $passwddb=$alumno->passwd;
            $emaildb=$alumno->email;
            $nombredb=$alumno->nombre;
        }
        foreach($profesores as $profesor){
            $passwddbp=$profesor->passwd;
            $emaildbp=$profesor->email;
            $nombredbp=$profesor->nombre;
        }
        foreach($admins as $admin){
            $passwddba=$admin->passwd;
            $emaildba=$admin->email;
            $nombredba=$admin->nombre;
        }
        // ha trobat incidència
                                //if($count==1){
            //si la contraseña encriptada es igual a la contraseña guardada
            //if (md5($passwd)==$passwddb){
                if(empty($passwddbp)==TRUE && empty($passwddba)==TRUE && empty($passwddb)==FALSE){
            if($passwddb != ""){
            if (md5($passwd)==$passwddb){
            // establim sessió
              $_SESSION['nombre']=$nombredb;
              $_SESSION['email']=$emaildb;
              $nombre=$nombredb;
              if($session != NULL){
                  setcookie("datosEmail", $emaildb,0,"/","localhost");
            }
            //crea la sessió
            //si existe la cookie, es que ya ha iniciado sesion anteriormente
            if(isset($_COOKIE['fechasession'])){
                setcookie("fechasession",$_COOKIE['fechaultimases'],0,"/","localhost");
                setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
            }
            //primera vez que inicia sesion ya que la cookie no existe
            else{
                setcookie("fechasession","NO HAY ULTIMA SESION",0,"/","localhost");
                setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
            }
            //cuando se ejecute todo lo del login te manda al dashboard
                setcookie("iduser",$emaildb,0,"/","localhost");
                $tipo = "alumnos";
                setcookie("tipo",$tipo,0,"/","localhost");
                return view('dashboard', compact('tipo'));
            }
            else{
                return view("login");
            }
        }
    }
    
        else if(empty($passwddbp)==FALSE && empty($passwddba)==TRUE && empty($passwddb)==TRUE){
            if (md5($passwd)==$passwddbp){
                // establim sessió
                  $_SESSION['nombre']=$nombredbp;
                  $_SESSION['email']=$emaildbp;
                  $nombre=$nombredbp;
                  if($session != NULL){
                      setcookie("datosEmail", $emaildbp,0,"/","localhost");
                }
                //crea la sessió
                //si existe la cookie, es que ya ha iniciado sesion anteriormente
                if(isset($_COOKIE['fechasession'])){
                    setcookie("fechasession",$_COOKIE['fechaultimases'],0,"/","localhost");
                    setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
                }
                //primera vez que inicia sesion ya que la cookie no existe
                else{
                    $last_session="NO HAY ULTIMA SESION";
                    setcookie("fechasession",$last_session,0,"/","localhost");
                    setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
                }
                //cuando se ejecute todo lo del login te manda al dashboard
                    setcookie("iduser",$emaildbp,0,"/","localhost");
                    $tipo = "profesor";
                    setcookie("tipo",$tipo,0,"/","localhost");
                    return view('dashboard', compact("tipo"));
                }
                else{
                    return view("login");
                }
                
        }
        else if(empty($passwddbp)==true && empty($passwddba)==false && empty($passwddb)==TRUE){
            if (md5($passwd)==$passwddba){
                // establim sessió
                  $_SESSION['nombre']=$nombredba;
                  $_SESSION['email']=$emaildba;
                  $nombre=$nombredba;
                  if($session != NULL){
                      setcookie("datosEmail", $emaildba,0,"/","localhost");
                }
                //crea la sessió
                //si existe la cookie, es que ya ha iniciado sesion anteriormente
                if(isset($_COOKIE['fechasession'])){
                    setcookie("fechasession",$_COOKIE['fechaultimases'],0,"/","localhost");
                    setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
                }
                //primera vez que inicia sesion ya que la cookie no existe
                else{
                    $last_session="NO HAY ULTIMA SESION";
                    setcookie("fechasession",$last_session,0,"/","localhost");
                    setcookie("fechaultimases",date("Y:m:d h:i:s A'"),0,"/","localhost");
                }
                //cuando se ejecute todo lo del login te manda al dashboard
                    setcookie("iduser",$emaildba,0,"/","localhost");
                    $tipo="admins";
                    setcookie("tipo",$tipo,0,"/","localhost");
                    return view('dashboard', compact('tipo'));
                }
                else{
                    return view("login");
                }
                
        }
            // si las contraseñas no son iguales te manda al login
            else{
                $this->redirectTo("/");
            }
            
                                    //}
        //si no encuentra incidencia te manda al login
                                    //else{
                                    //}
    //si hay algun error te manda al login
    }catch(PDOException $e){
        
        return view('login');

    }
    
    }
    else{
        $this->redirectTo("/");
    }

    }
        public function index()
        {
            //$alumnos = Registry::get('database')->selectAll('alumnos');
            
            $this->redirectTo("/");
            
        }
    }