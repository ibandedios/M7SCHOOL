<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;
use App\Database\Connection;


class ModificarController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function modifycurso(){
            $curso=filter_input(INPUT_POST, 'curso');
            $nuevoN=filter_input(INPUT_POST, 'nombre');
            $curso = intval($curso);
            Registry::get('database')->modificarCurso($curso, $nuevoN);
            $this->redirectTo("/manage");
            
}

    public function modifymateria(){
        $materia=filter_input(INPUT_POST, 'materia');
        $nuevaM=filter_input(INPUT_POST, 'nombre');
        $materia = intval($materia);
        if($nuevaM != "" && $nuevaM != " "){
            Registry::get('database')->modificarMateria($materia, $nuevaM);
        }

        $this->redirectTo("/manage");
    }

    public function modifyuser(){
        $nombre=filter_input(INPUT_POST, 'nombre');
        $email=filter_input(INPUT_POST, 'email');
        var_dump($nombre, $email);
        $profesores = Registry::get('database')->tipoProfesor($email);
        foreach($profesores as $profesor){
            $emaildbp=$profesor->email;
        }
        if(empty($emaildbp)){
            $tipo = "alumnos";
        }
        else{
            $tipo = "profesor";
        }
        if($nombre != "" && $nombre != " "){
            Registry::get('database')->modificarUsuario($tipo, $email, $nombre);
        }

        $this->redirectTo("/manage");
    }

    public function removecurso(){
        $curso=filter_input(INPUT_POST, 'curso');
        $curso = intval($curso);
        Registry::get('database')->borrarCurso($curso);
        $this->redirectTo("/manage");
        
    }

    public function removemateria(){
        $materia=filter_input(INPUT_POST, 'materia');
        $materia = intval($materia);
        var_dump($materia);
        Registry::get('database')->borrarMateria($materia);
        $this->redirectTo("/manage");
        
    }

public function index()
{
    //$alumnos = Registry::get('database')->selectAll('alumnos');
    
    $this->redirectTo('/dashboard');
    
}
}