<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class TareasController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            //$alumnos = Registry::get('database')->selectAll('alumnos');
            
            $email = $_COOKIE['iduser'];
            $lista_tareas = Registry::get('database')->selectAll('tarea');
            #$lista_tareas = Registry::get('database')->mostrarTareas($email);
            $tareas = [];
            if (isset($_COOKIE['tareas'])){
                if($_COOKIE['tareas']!=NULL){
                    //te reemplaza los datos como FALSE
                    setcookie('tareas',FALSE,0,"/","localhost");
                }
            }
            if($lista_tareas != NULL){
                foreach($lista_tareas as $tarea){
                    $emaildb=$tarea->email_user;
                    $nombredb=$tarea->nomTarea;
                    if($emaildb == $email){
                        $tareas[] = $nombredb;
                    }
                    
                }
            $tarea = implode(',', $tareas);
            setcookie("tareas", $tarea, 0, "/", "localhost");

            return view('tareas', compact('tareas'));
            }
            
        }
    }