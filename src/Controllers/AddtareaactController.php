<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class AddtareaactController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            #$nomTarea = "";
            $nomTarea=filter_input(INPUT_POST, 'nomTarea');
            $email_user=$_COOKIE['iduser'];
            //intentar
            if($nomTarea == "" || $nomTarea == " "){
                
                return view('addtarea');
            }
            
            try{
            //insertar en la tabla tarea en los campos email,nombre,password,
            Registry::get('database')->insertTarea($nomTarea, $email_user);
    
            $this->redirectTo('tareas');
            //si hay algun error porque el email no se puede repetir en la base de datos,
            //se tiene que repetir el registro
            }
            catch(PDOException $e){
                return view('addtarea');
            }
            
        }
    }
