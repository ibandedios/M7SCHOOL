<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class AddmateriaactController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $nombre=filter_input(INPUT_POST, 'materia');
            $emailProfesor=filter_input(INPUT_POST, 'profesor');
            $curso=filter_input(INPUT_POST, 'curso');
            if($nombre != "" && $nombre != " "){
            $cursoid = intval($curso);
            Registry::get('database')->insertMateria($nombre, $emailProfesor, $cursoid);
            $this->redirectTo('/dashboard');
            }
            else{
                $this->redirectTo("/addmateria");
            }
            
        }
    }
