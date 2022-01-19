<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;
use App\Database\Connection;


class RegactionController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function register(){

    $user=filter_input(INPUT_POST, 'user');
    $email=filter_input(INPUT_POST, 'email');
    $tipo=filter_input(INPUT_POST, 'tipo');
    $curso=filter_input(INPUT_POST, 'curso');
    $cursoid=(int)$curso;
    $passwd=filter_input(INPUT_POST, 'pass');
    //intentar
    try{
    //insertar en la tabla usuarios en los campos email,nombre,password,
    //los valores de las variables, con passwd encriptado en md5
    $profesoresdb = Registry::get('database')->selectAll('profesor');
    $alumnosdb = Registry::get('database')->selectAll('alumnos');
    foreach($profesoresdb as $profesor){
        if($profesor->email == $email){
            return view("register");
        }
    }
    foreach($alumnosdb as $alumno){
        if($alumno->email == $email){
            return view("register");
        }
    }
    if($tipo == "profesor"){
        $profesores = Registry::get('database')->registerProfesor($email, $user, $passwd);
    }
    else{
        $alumnos = Registry::get('database')->registerAlumno($email, $user, $passwd, $cursoid);
    }
    //cuando se ejecute todo te manda al home
    //$this->redirectTo('');
    //si hay algun error porque el email no se puede repetir en la base de datos,
    //se tiene que repetir el registro
    if(isset($_COOKIE['tipo']) == TRUE && $_COOKIE['tipo'] == "admins"){
        
               return view("dashboard");
    }
    else{
        $this->redirectTo('/');
    }
    
    }
    catch(PDOException $e){
        return view('login');
    }
}

public function index()
{
    //$alumnos = Registry::get('database')->selectAll('alumnos');
    
    $this->redirectTo('/login');
    
}
}